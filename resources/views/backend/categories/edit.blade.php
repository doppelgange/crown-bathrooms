@extends('layouts.backend.leftcol')

@section('content')
    <h1 class="page-header">Edit Category</h1>
    <div class="container">
        <div class="row">
            @if(!is_null($object))
                <div class="col-xs-4"><img src="{{$object->image_url}}" alt="" class="img-rounded"></div>
            @endif
        </div>
        <div class="row">
            {!! form($form) !!}
        </div>
    </div>
@endsection