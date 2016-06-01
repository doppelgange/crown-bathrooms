@extends('layouts.backend.leftcol')

@section('content')
    <h1 class="page-header">Edit Category</h1>
    <div class="container">
        <div class="row">
            {!! form($form) !!}
        </div>
    </div>
@endsection