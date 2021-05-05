<!doctype html>
    <html>
        <head>
            @include('includes.head')
            @yield('head')
        </head>
        <body>
            <div class="mainContainer">
                <header class="row">
                    @include('includes.header')
                </header>

                <div id="main" class="row">

                    @yield('content')

                </div>
            </div>
            <footer class="row">
                @include('includes.footer')
            </footer>
        </body>
</html>
<link rel="stylesheet" href="{{ URL::asset('css/app.css') }}" />
