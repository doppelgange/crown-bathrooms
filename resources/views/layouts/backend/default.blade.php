@extends('layouts.master')

@section('head.title')
    Crown Bathrooms
@endsection

@section('head.anchor')
    New Zealand's leading supplier of Bathrooms
@endsection

@section('head.meta')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Management System">
@endsection

@section('head.style')
    <link rel="icon" href="/img/favicon.ico">
    <link href="{{ elixir('css/app.css') }}" rel="stylesheet">
    <link href="{{ elixir('css/backend.css') }}" rel="stylesheet">
@endsection

@section('header')
    @include('layouts.backend.snippets.header')
@endsection

@section('main')
    <div class="container-fluid">
        <div class="col-sm-3 col-md-2 sidebar">
            @include('layouts.backend.snippets.sidebar')
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            @yield('content')
        </div>
    </div>
@endsection

@section('footer')
    @include('layouts.backend.snippets.footer')
@endsection
