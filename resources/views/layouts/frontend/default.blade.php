@extends('layouts.master')

@section('head.title')
    Crown Bathrooms
@stop

@section('head.anchor')
    New Zealand's leading supplier of Bathrooms
@stop

@section('head.meta')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Crown bathrooms has New Zealand’s largest range of contemporary, designer and traditional bathroom products. Our range is selected to meet the needs, tastes and budgets of anyone building or renovating a home, or anyone specifying a commercial project.  Our extensive range includes: Bathroom Furniture &amp; Vanities, Basins, Toilets &amp; Bidets, Bathroom Tapware, Showers, Baths, Bathroom Accessories, Butler Sinks and Kitchen Taps.">
    <meta name="keywords" content="">
@stop

@section('head.style')
    <link rel="icon" href="/img/favicon.ico">
    <link href="{{ elixir('css/app.css') }}" rel="stylesheet">
    <link href="{{ elixir('css/frontend.css') }}" rel="stylesheet">
@stop

@section('body.before')
    <div class="top-bar">
        <div class="container">
        <span class="socials-list">
            <a href="#"><i class="fa fa-facebook-square fa-fw" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-twitter-square fa-1x" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-instagram fa-1x" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-google-plus-official fa-1x" aria-hidden="true"></i></a>
        </span>
        <span class="pull-right">
            <a href="#"><i class="fa fa-map-marker f-1x"></i> 62 Waione St, Petone, Lower Hutt 5012</a>
            <a href="#"><i class="fa fa-phone fa-1x" aria-hidden="true"></i>  04-920 9991</a>
            <a href="/selector/">
                <i class="fa fa-star fa-1x" aria-hidden="true"></i>
                Selector
                <span class="badge @if(Cart::count()>0) progress-bar-danger @endif" >{{Cart::count()}}</span>
            </a>

            @if(Auth::check())
            <a href="/backend/"> Hello, {{Auth::user()->name}} </a>
            <a href="/logout"><i class="fa fa-sign-in fa-1x" aria-hidden="true"></i> Logout </a>
            @else
            <a href="/login"><i class="fa fa-sign-in fa-1x" aria-hidden="true"></i> Login </a>
            @endif
        </span>

        </div>
    </div>
@endsection

@section('header')
    @include('layouts.frontend.header')
@stop

@section('footer')
    @include('layouts.frontend.footer')
@stop
@section('footer.script.shared')
    <script src="{{ elixir("js/main.js") }}"></script>
    <script src="{{ asset("js/app.js") }}"></script>
@stop
