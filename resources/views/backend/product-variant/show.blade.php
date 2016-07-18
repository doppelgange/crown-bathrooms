@extends('layouts.backend.leftcol')

@section('content')
    <h3 class="page-header">
        {{$variant->name}}
        <a href="{{route('backend.product.{product}.variant.index',$product->id)}}"  class="btn btn-primary pull-right">Back to variant list</a>

    </h3>
    <div class="container">
        <div class="row">
            <table class="table">
                <tr>
                    <th>ID</th>
                    <td>{{$variant->id}}</td>
                    <th>Name</th>
                    <td>{{$variant->name}}</td>
                </tr>
                <tr>
                    <th>Code</th>
                    <td>{{$variant->code}}</td>
                    <th>Is Master</th>
                    <td>{{$variant->is_master==1?'Yes':'No'}}</td>
                </tr>
                <tr>
                    <th>Material</th>
                    <td>{{$variant->material}}</td>
                    <th>Color</th>
                    <td>{{$variant->color}}</td>
                </tr>
                <tr>
                    <th>Width</th>
                    <td>{{$variant->width}}</td>
                    <th>Depth</th>
                    <td>{{$variant->depth}}</td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td>{{$variant->price}}</td>
                    <th>Special Price</th>
                    <td>{{$variant->special_price}}</td>
                </tr>
                <tr>
                    <th>Created at</th>
                    <td>{{$variant->created_at}}</td>
                    <th>Updated at</th>
                    <td>{{$variant->updated_at}}</td>
                </tr>
                <tr>
                    <td><label>Description</label></td>
                    <td colspan="3">
                        {!! $variant->description !!}
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection