@extends('layouts.backend.leftcol')
@section('content')
    <h1 class="page-header">List Categories</h1>
    @include('backend.categories.snippets.list',compact('categories'))

    {{--@include('layouts.backend.snippets.datatable', ['dataTable' => $dataTable, 'buttons' => true])--}}
@endsection