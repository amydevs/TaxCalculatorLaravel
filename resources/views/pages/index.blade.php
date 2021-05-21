@extends('layouts.default')

@section('content')
    <div class="mainIndexContent">
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
        @include('includes.index.form')
    </div>
@stop

@section('furtherContent')
    <div id="furtherInfo">

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
            min-width: 60vh;
            min-height: 60vh;
            padding: 10px;
            border-radius: var(--universalBorderRadius);
            gap: 10px;
        }
        .taxTable {
            flex: 1;
            width: 100%;
        }
        .mainIndexContent :is(table, th, td) {
            border: 1px solid black;
            border-collapse: collapse;
        }
        form {
            display: grid;
            grid-template-columns: auto auto;
            align-items: center;
            justify-content: center;
            padding: 10px;
            -moz-column-gap: 10px;
                column-gap: 10px;
            row-gap: 10px;
            border-radius: var(--universalBorderRadius);
            background: var(--layerWidgetBackground);
        }
        form label {
            width: -webkit-max-content;
            width: -moz-max-content;
            width: max-content;
        }
        form button {
            background: var(--layerWidgetBackground);
            border: none;
            padding: 5px;
            border-radius: var(--universalBorderRadius);
        }
        form button:hover {
            cursor: pointer;
        }
    </style>

    <style>
        #furtherInfo {
            height: 100vh;
        }
    </style>
@stop
