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
    <div class="mainIndexContent" style="min-height: 70vh;">
        @include('includes.index.formnav')
        <h3 style="margin: 5px 0px 5px 3px;">Tax Calculator for {{ $selectedBracket }} 2021/2020</h3>
        <div id="firstIndexTableContainer">
            @include('includes.index.table',  ['taxBrackets' => $brackets])
        </div>
        @include('includes.index.form')
    </div>
@stop

@section('furtherContent')
    {{-- output of calculator if the post exists --}}
    @if (Str::length($taxableIncome) != 0)
    <div class="repeatableHeight scrollSnapStart" id="output" style="display: flex;flex-direction: column;">
        @include('includes.other.scrol2tophalf')
        <div id="furtherContent" class="repeatableContent" style="flex: 1;">
            <div class="mainIndexContent">
                <span>
                    <h1>Results</h1>
                    @include('includes.index.table',  ['taxBrackets' => $brackets])
                    <br>
                    @include('includes.index.outputtable')
                    <p style="text-align: center">
                        You need to pay ${{ $calculatorObject->calculate($taxableIncome, $brackets) }} in Tax.<br>
                        Please click the arrow at the top to enter another calculation.
                    </p>
                </span>
            </div>
        </div>
    </div>
    @endif

    {{-- about section --}}
    <div class="repeatableHeight scrollSnapStart" id="about" style="display: flex;flex-direction: column;">
        @include('includes.other.scrol2tophalf')
        <div id="furtherContent" class="repeatableContent" style="flex: 1;">
            <div class="mainIndexContent" style="flex: 1; align-self: stretch;">
                <span>
                    <h1>About</h1>
                    <p>Welcome to TaxCalc.com. A comprehensive tax calculator that calculates tax according to standards imposed by the Australian Taxation Office. Please note that we are completely independent and unaffiliated with the Australian Taxation Office and related institutions.</p>
                    <h2>2021/2020 Brackets</h2>
                    @foreach ($calculatorObject->allBrackets as $key => $aboutBracket)
                        <h3>{{ $key }}</h3>
                        @include('includes.index.table',  ['taxBrackets' => $aboutBracket])
                    @endforeach
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
        /* Set Table Sizes */
        #firstIndexTableContainer {
            width: 100%;
            flex: 1;
        }
        #firstIndexTableContainer > table {
            height: 100%;
        }
        table {
            width: 100%;
        }
    </style>
    {{-- Fixes table sizes for Chrome only! --}}
    @if (strpos(request()->header('User-Agent'), "Chrome") !== false)
        <script>
            window.onload = function() {
                var taxCont = document.querySelector("#firstIndexTableContainer");
                var taxTable = taxCont.querySelector("table");
                function resized() {
                    taxTable.style.height = "0px";
                    taxTable.style.height = `${taxCont.offsetHeight}px`;
                }
                resized()
                window.onresize = resized;
            }
        </script>
    @endif

    <style>
        #furtherContent {
            background-image: url("{{ URL::asset('assets/index/graphing_calc_large.jpg') }}");
            background-attachment: var(--dynamicallyFixedBackgroundAttatchment);
        }
    </style>
@stop
