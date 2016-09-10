@extends('layouts.backend.leftcol')
@section('content')
    <h1 class="page-header clearfix">
        <div class="col-md-6">List Product variants</div>
        <form class="col-md-6 form-inline" action="/backend/variant" method="GET">
            {{--<div class="input-group">--}}
                <input type="text" class="form-control" placeholder="product code" name="code">
                <input type="text" class="form-control" placeholder="product variants..." name="name">
                {{--<span class="input-group-btn">--}}
                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                {{--</span>--}}
            {{--</div>--}}
        </form>
    </h1>
    @include('backend.products.snippets.variant_list',compact('variants'))
@endsection