<!-- Written/Edited by June Yan (c) 2021 -->
<div id="footer">
    <div class="flexerClass" style="flex: 1; align-self: stretch; flex-flow: column; gap: 24px;">
        <div style="text-align: center; font-size: 18pt;">TaxCalc.com</div>
        <div class="flexerClass" style="width: 100%;">
            @foreach (Route::getRoutes() as $route)
                @if (strpos($route->getName(), env('NAVABLEPREFIX')) === 0)
                    <a href="{{route($route->getName())}}" style="flex: 1; text-align: center;">
                        {{ str_replace(env('NAVABLEPREFIX'), "", $route->getName()) }}
                    </a>
                @endif
            @endforeach
        </div>
    </div>
    <span style="font-size: 10pt;">© Copyright 2021 AyanAmy</span>
</div>
{{-- bottom left scroll to top buttons --}}
<button onclick="javascript:document.body.scrollTop = 0; document.documentElement.scrollTop = 0;" id="scroll2Top" title="Go to top">
    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
        <path fill="currentColor" d="M13,20H11V8L5.5,13.5L4.08,12.08L12,4.16L19.92,12.08L18.5,13.5L13,8V20Z" />
    </svg>
</button>

<style>
    #footer {
        background: var(--navBackgroundColour);
        color: var(--navColour);
        height: 20vh;
        display: flex;
        padding: 10px;
        align-items: center;
        flex-flow: column;
        position: relative;
        gap: 10px;
    }
    #footer a {
        font-size: 14pt;
        text-decoration: none;
        color: var(--navColour);
    }
    #footer .flexerClass {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #scroll2Top {
        display: none;
        position: fixed;
        bottom: 2vh;
        right: 0;
        z-index: 99;
        border: none;
        background-color: var(--navHoverColour);
        color: var(--navColour);
        width: 5.5vh;
        height: 5.5vh;
        cursor: pointer;
        justify-content: center;
        align-items: center;
        border-radius: 100%;
        font-size: 50pt;
        transition: all var(--easeTransition);
    }

    #scroll2Top:hover {
        background-color: var(--navBackgroundColour);
        box-shadow: var(--widgetHoverBoxShadows);
    }
</style>

<script>
    // Initialize button
    scrollButton = document.getElementById("scroll2Top");
    var defaultState = scrollButton.style.transform = "translateX(6vh) rotate(90deg)";
    scrollButton.style.display = "flex";

    document.addEventListener('scroll', (e) => {
        // when scroll past 20 pixels, enable the scroll 2 top button
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            scrollButton.style.transform = "translateX(-2vh)";
        }
        else {
            scrollButton.style.transform = defaultState;
        }
    })
</script>
