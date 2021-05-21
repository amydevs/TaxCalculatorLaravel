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
                <tbody>
            </table>
        </div>
        @include('includes.index.form')
    </div>
@stop


@section('head')
    <style>
        #main {
            height: 100%;
            display: flex;
            justify-content: center;
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-image: url("{{ URL::asset('assets/index/calculator_large.jpg') }}");
        }
        .mainIndexContent {
            justify-self: center;
            align-self: center;
            background: rgba(255, 255, 255, 1);
            padding: 10px;
            border-radius: var(--universalBorderRadius);
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
@stop
