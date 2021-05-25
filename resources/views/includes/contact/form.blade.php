<form id="contactForm" method="POST" action="{{ Request::getRequestUri() }}">
    @csrf
    <input type="text" id="fname" name="fname" placeholder="First Name" value="{{ request()->get("fname") }}">

    <input type="text" id="lname" name="lname" placeholder="Last Name" value="{{ request()->get("lname") }}">

    <textarea id="body" name="body" style="width: 75vw; height: 40vh; min-width: 300px;" placeholder="Type Your Message Here"></textarea>

    <button type="submit" value="Submit" style="grid-column: 1 / span 2;">Submit</button>
</form>

@section('head')
    @parent
    @if (count(request()->all()) > 0)
        <script>
            window.onload = function(){
                document.querySelector('textarea#body').innerHTML = '{{ request()->get("body") }}';
                location.href = ('mailto:ayanamydev@gmail.com?subject=TaxCalc.com Inquiry from {{ request()->all()["fname"] }} {{ request()->all()["lname"] }}&body={{ request()->all()["body"] }}');
            }
        </script>
    @endif

    <style>
        /* form styling */
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
    </style>
@endsection
