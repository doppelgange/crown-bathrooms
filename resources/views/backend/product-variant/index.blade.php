@extends('layouts.backend.leftcol')
@section('content')
    <h1 class="page-header">List Product variants</h1>
    @include('backend.products.snippets.variant_list',compact('variants'))

    {{--@include('layouts.backend.snippets.datatable', ['dataTable' => $dataTable, 'buttons' => true])--}}
@endsection