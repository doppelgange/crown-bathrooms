@extends('layouts.backend.leftcol')

@section('content')
    <h1 class="page-header">Product Detail</h1>
    <div class="container">
        <div class="row">
            <table class="table">
                <tr>
                    <td><label>ID</label></td>
                    <td>{{$product->id}}</td>
                    <td><label>Name</label></td>
                    <td>{{$product->name}}</td>
                    <td><label>Category</label></td>
                    <td>
                        {{$product->category->name}}
                    </td>
                </tr>
                <tr>
                    <td><label>Created at</label></td>
                    <td>{{$product->created_at}}</td>
                    <td><label>Updated at</label></td>
                    <td colspan="3">{{$product->updated_at}}</td>
                </tr>
                <tr>
                    <td><label>Description</label></td>
                    <td colspan="5">
                        {!! $product->name !!}
                    </td>
                </tr>
            </table>
            <h2 class="page-header">Product Variants Detail</h2>
            @foreach($product->variants as $variant)
                <ul>
                    <li><label>ID</label> {{$variant->id}}</li>
                    <li><label>Name</label> {{$variant->name}}</li>
                    <li><label>Color</label> {{$variant->color}}</li>
                    <li><label>Width</label> {{$variant->width}}</li>
                    <li><label>Depth</label> {{$variant->depth}}</li>
                    <li><label>Price</label> {{$variant->price}}</li>
                    <li><label>Special Price</label> {{$variant->special_price}}</li>
                    <li><label>Description</label> {!!  $variant->description  !!}</li>
                </ul>
            @endforeach
        </div>
    </div>
    @if(count($product->subCategories))
        <h2 class="sub-header">Sub Categories</h2>
        @include('backend.categories.snippets.list',['categories'=>$product->subCategories()->paginate()])
    @endif
@endsection