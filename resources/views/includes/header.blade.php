<nav class="navbar">
    <ul class="nav">
        @foreach (Route::getRoutes() as $route)
            @if (strpos($route->getName(), 'navable.') === 0)
                <li><a href="{{route($route->getName())}}" class="{{ Route::currentRouteNamed($route->getName()) ? 'active' : '' }}">Home</a></li>
            @endif
        @endforeach
    </ul>
</nav>

<link rel="stylesheet" href="{{ URL::asset('css/includes/header.blade.css') }}" />
