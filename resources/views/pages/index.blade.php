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
    <div class="repeatableHeight scrollSnapStart" style="display: flex;flex-direction: column;">
        @include('includes.other.scrol2tophalf')
        <div id="furtherContentViewport"class="repeatableContent" style="flex: 1;">
            <div class="mainIndexContent" style="flex: 1; align-self: stretch;">
                <span>
                </span>
            </div>
        </div>
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
        #furtherContentViewport {
            background-image: url("{{ URL::asset('assets/index/graphing_calc_large.jpg') }}");
            background-attachment: var(--dynamicallyFixedBackgroundAttatchment);
        }
    </style>
@stop
