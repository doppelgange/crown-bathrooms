@extends('layouts.backend.leftcol')

@section('content')
    <h1 class="page-header">Category Detail</h1>
    <div class="container">
        <div class="row">
            <div class="col-xs-4"><img src="{{$category->image_url}}" alt="{{$category->name}}" width="100%" class="img-thumbnail"></div>
            <div class="col-xs-8">
                <table class="table">
                <tr>
                    <td><label>ID</label></td>
                    <td>{{$category->id}}</td>
                </tr>
                <tr>
                    <td><label>Name</label></td>
                    <td>{{$category->name}}</td>
                </tr>
                <tr>
                    <td><label>Parent Category</label></td>
                    <td>
                        {{$category->parent_category_name}}</td>
                </tr>
                <tr>
                    <td><label>Description</label></td>
                    <td>{!! $category->description !!}</td>
                </tr>
                <tr>
                    <td><label>Created at</label></td>
                    <td>{{$category->created_at}}</td>
                </tr>
                <tr>
                    <td><label>Updated at</label></td>
                    <td>{{$category->updated_at}}</td>
                </tr>
            </table>
            </div>
        </div>
    </div>
    @if(count($category->subCategories))
        <h2 class="sub-header">Sub Categories</h2>
        @include('backend.categories.snippets.list',['categories'=>$category->subCategories()->paginate()])
    @endif
@endsection