@extends('layouts.backend.leftcol')
@section('content')
    <h1 class="page-header clearfix">
        <div class="col-md-6">List Categories</div>
        <form class="col-md-6" action="/backend/category" method="GET">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for categories..." name="query">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </span>
            </div>
        </form>
    </h1>
    @include('backend.categories.snippets.list',compact('categories'))

    {{--@include('layouts.backend.snippets.datatable', ['dataTable' => $dataTable, 'buttons' => true])--}}
@endsection