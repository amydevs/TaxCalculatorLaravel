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
    </ul>
</nav>

<style type="text/less">
    .navbar {
        ul {
            background-color: var(--navBackgroundColour);
            font-size: var(--specifiedFontSize);
            list-style-type: none;
            margin: 0;
            overflow: hidden;
            padding: 0;
            li {
                float: left;
                a {
                    color: var(--navColour);
                    display: block;
                    padding: 14px 16px;
                    text-align: center;
                    text-decoration: none;
                    transition: var(--easeTransition);
                    &:hover {
                        background-color: var(--navHoverColour);
                        box-shadow: var(--widgetHoverBoxShadows);
                        color: var(--navColour);
                        z-index: 999;
                    }
                }
            }
        }
        .active {
            background: var(--navColour);
            color: var(--navBackgroundColour);
        }
    }
</style>
