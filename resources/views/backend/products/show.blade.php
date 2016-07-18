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
                        <a href="{{route('backend.category.show', ['id' => $product->category->id])}}">
                        {{$product->category->name}}
                        </a>
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
                        {!! $product->description !!}
                    </td>
                </tr>
            </table>
            <h2 class="page-header">Product Variants Detail</h2>
            @include('backend.products.snippets.variant_list')
        </div>
    </div>
@endsection