<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="/img/favicon.ico">
    <link href="{{ elixir('css/app.css') }}" rel="stylesheet">
    <link href="{{ elixir('css/frontend.css') }}" rel="stylesheet">
</head>
<body>
aaa
<div class="container">
    <div class="row">
    <component is="FrontendHomeIndex"  inline-template>
        <span v-show="show" class="animated" transition="bounce"> AAAAAAAA</span>
        <button class="btn btn-primary" @click="ok = false">click</button>
        <pre>@{{show}}</pre>
        <div class="jumbotron">
            <h1 v-show="show" class="animated" transition="bounce">Hello, world!</h1>
            <p>...</p>
            <p>
                <button class="btn btn-primary btn-lg" @click="show=!show">Learn more</button>
            </p>
        </div>
    </component>
    </div>
</div>
    <script src="https://vuejs.org/js/vue.js"></script>
    <script src="{{ asset("js/app.js") }}"></script>
</body>
</html>
