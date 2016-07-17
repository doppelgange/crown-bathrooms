@extends('layouts.backend.leftcol')

@section('content')
    <h1 class="page-header">Product Detail</h1>
    <div class="container">
        <div class="row">
            <table class="table">
                <tr>
                    <td><label>ID</label></td>
                    <td>{{$product->id}}</td>
                </tr>
                <tr>
                    <td><label>Name</label></td>
                    <td>{{$product->name}}</td>
                </tr>
                <tr>
                    <td><label>Category</label></td>
                    <td>
                        {{$product->category->name}}
                    </td>
                </tr>
                <tr>
                    <td><label>Created at</label></td>
                    <td>{{$product->created_at}}</td>
                </tr>
                <tr>
                    <td><label>Updated at</label></td>
                    <td>{{$product->updated_at}}</td>
                </tr>
            </table>
            <h2 class="page-header">Product Variants Detail</h2>
            @foreach($product->variants as $variant)
            <table class="table">
                <tr>
                    <td><label>ID</label></td>
                    <td>{{$variant->id}}</td>
                </tr>
                <tr>
                    <td><label>Name</label></td>
                    <td>{{$variant->name}}</td>
                </tr>
                <tr>
                    <td><label>Color</label></td>
                    <td>{{$variant->color}}</td>
                </tr>
                <tr>
                    <td><label>Width</label></td>
                    <td>{{$variant->color}}</td>
                </tr>
                <tr>
                    <td><label>Depth</label></td>
                    <td>{{$variant->color}}</td>
                </tr>
                <tr>
                    <td><label>Price</label></td>
                    <td>{{$variant->color}}</td>
                </tr>
                <tr>
                    <td><label>Special Price</label></td>
                    <td>{{$variant->color}}</td>
                </tr>
                <tr>
                    <td><label>Description</label></td>
                    <td>{!!  $variant->description  !!}</td>
                </tr>
            </table>
            @endforeach
        </div>
    </div>
    @if(count($product->subCategories))
        <h2 class="sub-header">Sub Categories</h2>
        @include('backend.categories.snippets.list',['categories'=>$product->subCategories()->paginate()])
    @endif
@endsection