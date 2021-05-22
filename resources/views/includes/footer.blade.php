<div id="footer"><span>© Copyright 2021 AyanAmy</span></div>
<button onclick="javascript:document.body.scrollTop = 0; document.documentElement.scrollTop = 0;" id="scroll2Top" title="Go to top">^</button>

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
        background-color: black;
        color: white;
        width: 6vh;
        height: 6vh;
        cursor: pointer;
        justify-content: center;
        align-items: center;
        border-radius: 100%;
        font-size: 50pt;
        transition: var(--easeTransition);
    }

    #myBtn:hover {
        background-color: #555; /* Add a dark-grey background on hover */
    }
</style>

<script>
    // Initialize button
    scrollButton = document.getElementById("scroll2Top");
    var defaultState = "translateX(10vh) rotate(100deg)"
    scrollButton.style.transform = defaultState;
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
