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

<style>
    .navbar ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #212121;
    }
    .navbar ul li {
        float: left;
    }
    .navbar ul li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        transition: all 0.5s ease;
    }
    .navbar ul li a:hover {
        background-color: rgba(1, 1, 1, 0.8);
    }
</style>
