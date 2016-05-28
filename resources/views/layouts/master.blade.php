<!DOCTYPE html>
<html>
<head>
    <title>
        @yield('head.title') |
        @yield('head.anchor')
    </title>
    @yield('head.meta')
    @yield('head.style')
    @yield('head.script')
</head>
<body>
    @yield('body.before')
    <header>
        @yield('header')
    </header>
    <main>
        {{--<div class="container">--}}
            @yield('main')
        {{--</div>--}}
    </main>
    <footer>
        @yield('footer')
    </footer>
    @yield('body.after')
</body>
</html>