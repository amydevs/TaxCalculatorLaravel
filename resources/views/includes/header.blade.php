<nav class="navbar">
    <ul class="nav">
        <li><a href="/" class="@if(Route::current()->getName() == '') selected @endif">Home</a></li>
        <li><a href="/about">About</a></li>
        <li><a href="/projects">Projects</a></li>
        <li><a href="/contact">Contact</a></li>
    </ul>
</nav>

<link rel="stylesheet" href="{{ URL::asset('css/includes/header.blade.css') }}" />
