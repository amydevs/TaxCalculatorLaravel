{{-- Written/Edited by June Yan (c) 2021 --}}
{{-- this is the main home page of the site --}}
{{-- uses layouts/default.blade.php as a template for this page --}}
@extends('layouts.default')

@php
    // Set Defaults:
    $defaultBracket = "Residents";
    $bracketQueryKey = "bracket";

    //Import the php class in resources/php/calculator.php
    include("php/calculator.php");

    // Set TaxableIncome and selectedBracket here:
    $taxableIncome = request()->get("taxableIncome");

    // Set the selected tax bracket to the defaultBracket if the url query of "bracket" is empty
    $selectedBracket = request()->input($bracketQueryKey);
    if (Str::length($selectedBracket) == 0) { $selectedBracket = $defaultBracket; }

    $calculatorObject = new Calculator();
    // Instantiate the assosciative array from the instance of calculatorObject
    $brackets = $calculatorObject->allBrackets[$selectedBracket];
@endphp

@section('content')
    <div class="mainIndexContent" style="min-height: 70vh;">
        @include('includes.index.formnav')
        {{-- the title is set with the key of associative array --}}
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
        <div id="outputContent" class="repeatableContent" style="flex: 1;">
            <div class="mainIndexContent">
                <span>
                    <h1>Results</h1>
                    @include('includes.index.table',  ['taxBrackets' => $brackets])
                    <br>
                    @include('includes.index.outputtable')
                    <p style="text-align: center">
                        You need to pay ${{ number_format($calculatorObject->calculate($taxableIncome, $selectedBracket), 2, '.', ',')}} in Tax.<br>
                        Please click the up-arrow or scroll to the top to complete another calculation.
                    </p>
                </span>
            </div>
        </div>
    </div>
    @endif

    {{-- about section --}}
    <div class="repeatableHeight scrollSnapStart" id="about" style="display: flex;flex-direction: column;">
        {{-- this includes the scroll to top button halfway through the page --}}
        @include('includes.other.scrol2tophalf')
        <div id="furtherContent" class="repeatableContent" style="flex: 1;">
            <div class="mainIndexContent" style="flex: 1; align-self: stretch;">
                <span>
                    <h1>About</h1>
                    <p>Welcome to TaxCalc.com. A comprehensive tax calculator that calculates tax according to standards imposed by the Australian Taxation Office. Please note that we are completely independent and unaffiliated with the Australian Taxation Office and related institutions.</p>
                    <h2>2021/2020 Brackets</h2>
                    {{-- for each bracket in the all tax brackets, include the indexs/table.blade.php file --}}
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
            background-attachment: var(--dynamicallyFixedBackgroundAttatchment);
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
            display: flex;
            align-items: stretch;
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
        #outputContent {
            background-image: url("{{ URL::asset('assets/index/scientific_calc_large.jpg') }}");
        }
        #furtherContent {
            background-image: url("{{ URL::asset('assets/index/graphing_calc_large.jpg') }}");
        }
    </style>
@stop
