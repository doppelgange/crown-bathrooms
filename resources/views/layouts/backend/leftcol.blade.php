@extends('layouts.backend.default')
@section('main')
    <div class="container-fluid">
        <div class="col-sm-3 col-md-2 sidebar">
            @include('layouts.backend.sidebar')
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            @yield('content')
        </div>
    </div>
@endsection