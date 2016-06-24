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
    @if(isset($vueView))
    <component is="{{$vueView}}">
    @endif
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

    @if(isset($vueView))
    </component>
    @endif
    @yield('footer.script.shared')
    @yield('footer.script.page')
</body>
</html>