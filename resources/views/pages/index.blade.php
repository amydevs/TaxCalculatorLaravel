@extends('layouts.default')

@php
    include("php/calculator.php");
    $calculatorObject = new Calculator();
    $brackets = [
        $calculatorObject->createTaxArray(0, 0, 1),
        $calculatorObject->createTaxArray(0, 0.19, 18201),
        $calculatorObject->createTaxArray(5092, 0.325, 45001),
        $calculatorObject->createTaxArray(29467, 0.37, 120001),
        $calculatorObject->createTaxArray(51667, 0.45, 180001)
    ]
@endphp

@section('content')
    <div class="mainIndexContent">
        <div class="tableContainer">
            <table class="taxTable">
                <thead>
                    <tr>
                        <th>Income Thresholds</th>
                        <th>Base Tax</th>
                        <th>Rate</th>
                        <th>Tax Payable on This Income</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($brackets as $key=>$bracket)
                        <tr>
                            <td>${{ $bracket["minThreshold"] }} {{ array_key_exists($key+1, $brackets) ? "to $".($brackets[$key+1]["minThreshold"] - 1) : "and Over" }}</td>
                            <td>${{ $bracket["baseTax"] }}</td>
                            <td>{{ $bracket["perDollarTax"] * 100 }}%</td>
                            <td>${{ $bracket["baseTax"] }} plus ${{ $bracket["perDollarTax"] }} for each $1 over ${{ $bracket["minThreshold"] - 1 }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @include('includes.index.form')
        @php
            $taxableIncome = request()->get("taxableIncome");
            if (Str::length($taxableIncome) != 0) {
                echo $calculatorObject->calculate($taxableIncome, $brackets);
            }
        @endphp
    </div>
@stop

@section('furtherContent')
    <div style="width: 100%; height: 8px; background: var(--navBackgroundColour); display:flex; justify-content:center;">
        <div
            style="width: 50px; height: 50px; border-radius: 0px 0px 100px 100px; background: var(--navBackgroundColour); display:flex; justify-content:center; align-items:center; cursor: pointer; color: var(--navColour);"
            onclick="javascript:document.body.scrollTop = 0; document.documentElement.scrollTop = 0;"
        ><svg style="width:24px;height:24px" viewBox="0 0 24 24"><path fill="currentColor" d="M13,20H11V8L5.5,13.5L4.08,12.08L12,4.16L19.92,12.08L18.5,13.5L13,8V20Z" /></svg></div>
    </div>
    <div id="furtherContent" class="repeatable">

    </div>
@stop


@section('head')
    <style>
        .repeatable {
            height: 100vh;
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
            background-color: var(--defaultBackground, #fff);
            box-shadow: var(--widgetBoxShadows);
            display: flex;
            flex-direction: column;
            box-sizing: border-box;
            min-width: 40%;
            min-height: 70%;
            padding: 10px;
            border-radius: var(--universalBorderRadius);
            gap: 10px;
            margin: 5px;
        }
        .tableContainer {
            flex: 1;
            display: flex;
            border-radius: var(--universalBorderRadius);
                -moz-border-radius: var(--universalBorderRadius);
            overflow: hidden;
            border: 2px solid var(--textColour);
            box-shadow: var(--widgetBoxShadows);
            font-size: var(--specifiedFontSize);
        }
        .tableContainer :is(table, th, td) {
            flex: 1;
            border-collapse: collapse;
            border-radius: var(--universalBorderRadius);
            border: 1px solid var(--textColour);
            text-align: center;
            padding: 4px;
        }
    </style>

    <style>
        #furtherContent {
            background-image: url("{{ URL::asset('assets/index/graphing_calc_large.jpg') }}");
        }
    </style>
@stop
