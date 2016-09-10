@extends('layouts.backend.leftcol')
@section('content')
    <h1 class="page-header clearfix">
        <div class="col-md-6">List Products</div>
        <form class="col-md-6" action="/backend/product" method="GET">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for products..." name="query">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </span>
            </div>
        </form>
    </h1>
    @include('backend.products.snippets.list',compact('products'))
@endsection