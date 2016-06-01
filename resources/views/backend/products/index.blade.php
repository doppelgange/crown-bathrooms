@extends('layouts.backend.default')
@section('content')
    <h1 class="page-header">List Products</h1>
    @include('backend.products.snippets.list',compact('products'))

    {{--@include('layouts.backend.snippets.datatable', ['dataTable' => $dataTable, 'buttons' => true])--}}
@endsection