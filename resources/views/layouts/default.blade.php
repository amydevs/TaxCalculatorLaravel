<!doctype html>
    <html>
        <head>
            @include('includes.head')
            @yield('head')
            <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}" />
        </head>
        <body>
            <div class="mainContainer scrollSnapStart repeatableHeight">
                <header class="row">
                    @include('includes.header')
                </header>

                <div id="main" class="row repeatableContent">
                    @yield('content')
                </div>
            </div>

            @yield('furtherContent')

            <footer class="row scrollSnapEnd">
                @include('includes.footer')
            </footer>
        </body>
</html>
