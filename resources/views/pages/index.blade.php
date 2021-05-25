@extends('layouts.default')

@php
    // Defaults:
    $defaultBracket = "Residents";
    $bracketQueryKey = "bracket";

    //Set stuff here:
    include("php/calculator.php");

    $taxableIncome = request()->get("taxableIncome");



    $selectedBracket = request()->input($bracketQueryKey);
    if (Str::length($selectedBracket) == 0) { $selectedBracket = $defaultBracket; }

    $calculatorObject = new Calculator();
    $brackets = $calculatorObject->allBrackets[$selectedBracket];
@endphp

@section('content')
    <div class="mainIndexContent">
        @include('includes.index.formnav')
        @include('includes.index.table',  ['taxBrackets' => $brackets])
        @include('includes.index.form')
        @if (Str::length($taxableIncome) != 0)
            {{ $calculatorObject->calculate($taxableIncome, $brackets) }}
        @endif
    </div>
@stop

@section('furtherContent')
    <div style="width: 100%; height: 8px; background: var(--navBackgroundColour); display:flex; justify-content:center;" class="scrollSnapStart">
        <div style="width: 50px; height: 50px; border-radius: 0px 0px 100px 100px; background: var(--navBackgroundColour); display:flex; justify-content:center; align-items:center; cursor: pointer; color: var(--navColour);"
            onclick="javascript:document.body.scrollTop = 0; document.documentElement.scrollTop = 0;">
        <svg style="width:24px;height:24px" viewBox="0 0 24 24"><path fill="currentColor" d="M13,20H11V8L5.5,13.5L4.08,12.08L12,4.16L19.92,12.08L18.5,13.5L13,8V20Z" /></svg></div>
    </div>
    <div id="furtherContent" class="repeatableHeight repeatableContent">
    </div>
@stop

@section('head')
    @parent
    <style>
        /* set the style of the repeated content */
        .repeatableContent {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        #main {
            background-image: url("{{ URL::asset('assets/index/calculator_large.jpg') }}");
        }
        .mainIndexContent {
            min-height: 70vh;
        }
    </style>

    <style>
        #furtherContent {
            background-image: url("{{ URL::asset('assets/index/graphing_calc_large.jpg') }}");
            background-attachment: var(--dynamicallyFixedBackgroundAttatchment);
        }
    </style>
@stop
