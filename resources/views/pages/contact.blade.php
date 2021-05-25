@extends('layouts.default')

@section('content')
    <div class="mainIndexContent">
        @include("includes.contact.form")
    </div>
@stop

@section('furtherContent')
    <div style="width: 100%; height: 8px; background: var(--navBackgroundColour); display:flex; justify-content:center;" class="scrollSnapStart">
        <div style="width: 50px; height: 50px; border-radius: 0px 0px 100px 100px; background: var(--navBackgroundColour); display:flex; justify-content:center; align-items:center; cursor: pointer; color: var(--navColour);"
            onclick="javascript:document.body.scrollTop = 0; document.documentElement.scrollTop = 0;">
        <svg style="width:24px;height:24px" viewBox="0 0 24 24"><path fill="currentColor" d="M13,20H11V8L5.5,13.5L4.08,12.08L12,4.16L19.92,12.08L18.5,13.5L13,8V20Z" /></svg></div>
    </div>
    <div id="furtherContent" class="repeatableHeight repeatableContent">
        <div class="mainIndexContent">
        </div>
    </div>
@stop

@section('head')
    @parent
    @if (count(request()->all()) > 0)
        <script>
            console.log('mailto:ayanamydev@gmail.com?subject=TaxCalc.com Inquiry from {{ request()->all()["fname"] }} {{ request()->all()["lname"] }}&body={{ request()->all()["body"] }}')
            window.open('mailto:ayanamydev@gmail.com?subject=TaxCalc.com Inquiry from {{ request()->all()["fname"] }} {{ request()->all()["lname"] }}&body={{ request()->all()["body"] }}')
        </script>
    @endif

    <style>
        /* basic styling */
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
    </style>
    <style>
        #furtherContent {
            background-image: url("{{ URL::asset('assets/index/graphing_calc_large.jpg') }}");
            background-attachment: var(--dynamicallyFixedBackgroundAttatchment);
        }
    </style>
@stop

