@extends('layouts.default')

@section('content')
    <div class="mainIndexContent">
        <div class="tableContainer">
            <table class="taxTable">
                <thead>
                    <tr>
                        <th>Header 1</th>
                        <th>Header 2</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                </tbody>
            </table>
        </div>
        @include('includes.index.form')
    </div>
@stop

@section('furtherContent')
    <div id="furtherContent">

    </div>
@stop


@section('head')
    <style>
        #main {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-image: url("{{ URL::asset('assets/index/calculator_large.jpg') }}");
        }
        .mainIndexContent {
            background-color: var(--widgetBackground, #fff);
            box-shadow: var(--widgetBoxShadows);
            display: flex;
            flex-direction: column;
            box-sizing: border-box;
            min-width: 40%;
            min-height: 70%;
            padding: 10px;
            border-radius: var(--universalBorderRadius);
            gap: 10px;
        }
        .tableContainer {
            flex: 1;
            display: flex;
            border-radius: var(--universalBorderRadius);
                -moz-border-radius: var(--universalBorderRadius);
            overflow: hidden;
            border: 2px solid var(--textColour);
            box-shadow: var(--widgetBoxShadows);
        }
        .tableContainer :is(table, th, td) {
            flex: 1;
            border-collapse: collapse;
            border-radius: var(--universalBorderRadius);
            border: 1px solid var(--textColour);
        }
    </style>

    <style>
        #furtherContent {
            height: 100vh;
            background: var(--widgetBackground);
        }
    </style>
@stop
