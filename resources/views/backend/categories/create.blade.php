@extends('layouts.backend.leftcol')

@section('content')
    <h1 class="page-header">Create Category</h1>
    <div class="container">
        <div class="row">
            {!! form($form) !!}
        </div>
    </div>
@endsection