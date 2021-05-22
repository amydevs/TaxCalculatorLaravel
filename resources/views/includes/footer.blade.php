<div id="footer"><span>© Copyright 2021 AyanAmy</span></div>
<button onclick="javascript:document.body.scrollTop = 0; document.documentElement.scrollTop = 0;" id="scroll2Top" title="Go to top">
    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
        <path fill="currentColor" d="M13,20H11V8L5.5,13.5L4.08,12.08L12,4.16L19.92,12.08L18.5,13.5L13,8V20Z" />
    </svg>
</button>

<style>
    #footer {
        background: linear-gradient(to right, #f857a6, #ff5858);
        height: 20vh;
        display: flex;
    }
    #footer body {
        background: linear-gradient(#02AAB0, #00CDAC);
        background-clip: border-box;
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
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
        transition: var(--easeTransition);
    }

    #scroll2Top:hover {
        background-color: var(--navBackgroundColour); /* Add a dark-grey background on hover */
    }
</style>

<script>
    // Initialize button
    scrollButton = document.getElementById("scroll2Top");
    var defaultState = scrollButton.style.transform = "translateX(6vh) rotate(90deg)";
    scrollButton.style.display = "flex";

    document.addEventListener('scroll', (e) => {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            scrollButton.style.transform = "translateX(-2vh)";
        }
        else {
            scrollButton.style.transform = defaultState;
        }
    })
</script>
