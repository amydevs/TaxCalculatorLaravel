<nav class="navbar">
    <ul class="nav">
        @foreach (Route::getRoutes() as $route)
            @if (strpos($route->getName(), env('NAVABLEPREFIX')) === 0)
                <li>
                    <a href="{{route($route->getName())}}" class="{{ Route::currentRouteNamed($route->getName()) ? 'active' : '' }}">
                        {{ str_replace(env('NAVABLEPREFIX'), "", $route->getName()) }}
                    </a>
                </li>
            @endif
        @endforeach
        <li>
            <a id="darkModeButton" onclick="toggleDarkmode()" style="cursor: pointer;">
                Dark Mode
            </a>
        </li>
    </ul>
</nav>

{{-- Darkmode Toggle Stuff --}}
<script>
    var rootClassList = document.querySelector(':root').classList;
    if(localStorage.darkMode == 'true') { toggleDarkmode() }
    function toggleDarkmode() {
        rootClassList.toggle('darkMode');
        localStorage.setItem('darkMode', rootClassList.contains('darkMode'));
        document.querySelector('#darkModeButton').classList.toggle('active')
    }
</script>

<style>
    .navbar ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: var(--navBackgroundColour);
        font-size: var(--specifiedFontSize);
    }
    .navbar ul li {
        float: left;
    }
    .navbar ul li a {
        display: block;
        color: var(--navColour);
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        transition: box-shadow var(--easeTransition), background-color var(--easeTransition);
    }
    .navbar ul li a:hover {
        background-color: var(--navHoverColour);
        color: var(--navColour);
        box-shadow: var(--widgetHoverBoxShadows);
        z-index: 999;
    }
    .navbar .active {
        background: var(--navColour);
        color: var(--navBackgroundColour);
    }
</style>
