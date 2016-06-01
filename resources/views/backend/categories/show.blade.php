@extends('layouts.backend.leftcol')

@section('content')
    <h1 class="page-header">Category Detail</h1>
    <div class="container">
        <div class="row">
            <div class="col-xs-4"><img src="{{$object->image_url}}" alt="{{$object->name}}" width="100%" class="img-thumbnail"></div>
            <div class="col-xs-8">
                <table class="table">
                <tr>
                    <td><label>ID</label></td>
                    <td>{{$object->id}}</td>
                </tr>
                <tr>
                    <td><label>Name</label></td>
                    <td>{{$object->name}}</td>
                </tr>
                <tr>
                    <td><label>Parent Category</label></td>
                    <td>
                        {{$object->parent_category_name}}</td>
                </tr>
                <tr>
                    <td><label>Description</label></td>
                    <td>{{$object->description}}</td>
                </tr>
                <tr>
                    <td><label>Created at</label></td>
                    <td>{{$object->created_at}}</td>
                </tr>
                <tr>
                    <td><label>Updated at</label></td>
                    <td>{{$object->updated_at}}</td>
                </tr>
            </table>
            </div>
        </div>
    </div>
    @if(count($object->subCategories))
        <h2 class="sub-header">Sub Categories</h2>
        @include('backend.categories.snippets.list',['categories'=>$object->subCategories()->paginate()])
    @endif
@endsection