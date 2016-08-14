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
@section('header')
    @include('layouts.frontend.header')
@stop
@section('body.topbar')
    @include('layouts.frontend.topbar')
@stop

@section('footer')
    @include('layouts.frontend.footer')
@stop
@section('footer.script.shared')
    <script src="{{ elixir("js/main.js") }}"></script>
    <script src="{{ asset("js/app.js") }}"></script>
@stop
