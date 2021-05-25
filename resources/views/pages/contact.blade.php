@extends('layouts.default')

@section('content')
    <div class="mainIndexContent">
        <form id="contactForm" action="action_page.php">

            <input type="text" id="fname" name="firstname" placeholder="First Name">

            <input type="text" id="lname" name="lastname" placeholder="Last Name">

            <textarea id="subject" name="subject" placeholder="Content"></textarea>

            <button type="submit" value="Submit" style="grid-column: 1 / span 2;">Submit</button>
        </form>
    </div>
@stop

@section('head')
    @parent
    <style>
        #contactForm * {
            transition: var(--easeTransition);
        }
        #contactForm {
            display: flex;
            align-items: stretch;
            justify-content: stretch;
            flex-direction: column;
            -moz-column-gap: 10px;
                column-gap: 10px;
            row-gap: 10px;
        }
        #contactForm label {
            width: -webkit-max-content;
            width: -moz-max-content;
            width: max-content;
        }
        #contactForm button {
            background: var(--layerWidgetBackground);
            border: none;
            padding: 5px;
            border-radius: var(--universalBorderRadius);
            box-shadow: var(--widgetBoxShadows);
        }
        #contactForm button:hover {
            cursor: pointer;
            background-color: var(--hoverColour);
            color: var(--defaultBackground);
            box-shadow: var(--widgetHoverBoxShadows);
        }
        #taxableIncome {
            box-shadow: var(--widgetBoxShadows);
        }
        #taxableIncome:focus {
            box-shadow: var(--widgetHoverBoxShadows);
        }
        input[type=text], textarea {
            box-shadow: var(--widgetBoxShadows);
        }
        input[type=text]:focus, textarea:focus {
            box-shadow: var(--widgetHoverBoxShadows);
        }

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
@stop

