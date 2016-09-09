@extends('layouts.frontend.default')
@section('main')
    @include('frontend.product.snippets.breadcrumb')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('layouts.frontend.sidebar')
            </div>
            <div class="col-md-9">
                @include('frontend.product.snippets.list')
            </div>
        </div>
    </div>
@endsection
