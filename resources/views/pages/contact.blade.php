@extends('layouts.default')

@section('content')
    <div class="mainIndexContent">
        @include("includes.contact.form")
    </div>
@stop

@section('furtherContent')
    @include('includes.other.scrol2tophalf')
    <div id="furtherContent" class="repeatableHeight repeatableContent">
        <div class="mainIndexContent" style="flex: 1; align-self: stretch;">
            <span>
                <h2>Contact Information</h2>
                <p>Contact information for the administrator of this site:</p>
                <ul>
                    <li>Email: <a href="mailto:ayanamydev@gmail.com">ayanamydev@gmail.com</a></li>
                    <li>Phone Number: (+61) 493 932 853</li>
                </ul>
            </span>
        </div>
    </div>
@stop

@section('head')
    @parent
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
            background-image: url("{{ URL::asset('assets/contact/handstypingonkeyboard_large.jpg') }}");
        }
    </style>
    <style>
        #furtherContent {
            background-image: url("{{ URL::asset('assets/contact/laptopnotepad_large.jpg') }}");
            background-attachment: var(--dynamicallyFixedBackgroundAttatchment);
        }
    </style>
@stop

