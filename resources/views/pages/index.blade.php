@extends('layouts.default')

@section('head')
    <link rel="stylesheet" href="{{ URL::asset('css/pages/index.blade.css') }}" />
@stop

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
