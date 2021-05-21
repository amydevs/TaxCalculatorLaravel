@extends('layouts.default')

@section('content')
    <div class="mainIndexContent">
    </div>
@stop

@section('head')
    <style>
        #main {
            height: 100%;
            display: flex;
            justify-content: center;
        }
        .mainIndexContent {
            justify-self: center;
            align-self: center;
            background: var(--layerWidgetBackground);
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
