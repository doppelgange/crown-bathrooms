@extends('layouts.backend.leftcol')

@section('content')
    {{var_dump($errors)}}
    <h1 class="page-header">Create Product</h1>
    <div class="container">
        {{Form::open(['route'=>'backend.product.store','class'=>'form-horizontal'])}}
            <div class="form-group">
                <label class="control-label">Product information</label>
            </div>
            <div class="form-group @if($errors->first('category_id')) has-error @endif">
                <label class="control-label col-xs-2">Category</label>
                <div class="col-xs-10">
                    {{Form::select('category_id',$categories,old('category_id'),['class'=>'form-control'])}}
                    @if($errors->first('category_id'))
                        <span class="help-block">{{$errors->first('category_id')}}</span>
                    @endif
                </div>

            </div>
            <div class="form-group @if($errors->first('name')) has-error @endif">
                <label class="control-label  col-xs-2">Name</label>
                <div class="col-xs-10">
                    {{Form::text('name',old('name'),['class'=>'form-control'])}}
                    @if($errors->first('name'))
                        <span class="help-block">{{$errors->first('name')}}</span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-xs-2">Description</label>
                <div class="col-xs-10">
                    {{Form::textarea('description',old('description'),['class'=>'form-control'])}}
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Product variant detail</label>
            </div>
        <div class="product-variant">
            <div class="form-group @if($errors->first('product_variants.code')) has-error @endif">
                <label class="control-label col-xs-2">Code</label>
                <div class="col-xs-10">
                    {{Form::text('product_variants[code]',old('product_variants[code]'),['class'=>'form-control'])}}
                    @if($errors->first('product_variants.code'))
                        <span class="help-block">{{$errors->first('product_variants.code')}}</span>
                    @endif
                </div>
            </div>
            <div class="form-group @if($errors->first('product_variants.name')) has-error @endif">
                <label class="control-label col-xs-2">Name</label>
                <div class="col-xs-10">
                    {{Form::text('product_variants[name]',old('product_variants[name]'),['class'=>'form-control'])}}
                    @if($errors->first('product_variants.name'))
                        <span class="help-block">{{$errors->first('product_variants.name')}}</span>
                    @endif
                </div>
            </div>
            <div class="form-group @if($errors->first('product_variants.price')) has-error @endif">
                <label class="control-label col-xs-2">Price</label>
                <div class="col-xs-10">
                    {{Form::number('product_variants[price]',old('product_variants[price]'),['class'=>'form-control'])}}
                    @if($errors->first('product_variants.price'))
                        <span class="help-block">{{$errors->first('product_variants.price')}}</span>
                    @endif
                </div>
            </div>

        </div>
        {{--<tbody class="product-variant">--}}
        {{--<tr>--}}
        {{--<td>Product variant name</td>--}}
        {{--<td>--}}
        {{--{{Form::select('product_variants.name','')}}</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
        {{--<td>Parent Category</td>--}}
        {{--<td>--}}
        {{--{{Form::select('parent_category_id','')}}</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
        {{--<td>Name</td>--}}
        {{--<td>{{Form::text('Name','')}}</td>--}}
        {{--</tr>--}}
        {{--<tr>--}}
        {{--<td>Description</td>--}}
        {{--<td>{{Form::textarea('Description','')}}</td>--}}
        {{--</tr>--}}
        {{--</tbody>--}}

        </table>
        <button class="btn btn-primary" type="submit">Save</button>
        <button class="btn btn-warning" type="reset">Reset</button>
        {{ Form::close() }}
    </div>
    </div>
@endsection