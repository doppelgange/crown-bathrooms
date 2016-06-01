@extends('layouts.backend.leftcol')

@section('content')
    <h1 class="page-header">Product Detail</h1>
    <div class="container">
        <div class="row">
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
                    <td><label>Category</label></td>
                    <td>
                        {{$object->category_name}}
                    </td>
                </tr>
                <tr>
                    <td><label>Color</label></td>
                    <td>{{$object->color}}</td>
                </tr>
                <tr>
                    <td><label>Width</label></td>
                    <td>{{$object->color}}</td>
                </tr>
                <tr>
                    <td><label>Depth</label></td>
                    <td>{{$object->color}}</td>
                </tr>
                <tr>
                    <td><label>Price</label></td>
                    <td>{{$object->color}}</td>
                </tr>
                <tr>
                    <td><label>Special Price</label></td>
                    <td>{{$object->color}}</td>
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
    @if(count($object->subCategories))
        <h2 class="sub-header">Sub Categories</h2>
        @include('backend.categories.snippets.list',['categories'=>$object->subCategories()->paginate()])
    @endif
@endsection