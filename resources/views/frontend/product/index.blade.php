@extends('layouts.frontend.default')
@section('main')
    @include('frontend.product.snippets.breadcrumb')
    <div class="container no-gutter">
        <div class="col-md-2">
            aaa
        </div>
        <div class="col-md-10">
            @include('frontend.product.snippets.list')
        </div>
    </div>
@endsection
