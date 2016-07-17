@extends('layouts.backend.leftcol',['vueView'  => 'BackendProductEdit'])

@section('content')
    <h1 class="page-header">@if($view =='create') Create @else Edit @endif Product</h1>
    <div class="container">
        @if($view =='create')
            {{Form::open(['route'=>'backend.product.store','class'=>'form-horizontal','method'=>'POST','files'=>true])}}
        @else
            {{Form::open(['route'=>['backend.product.update',$product->id],'class'=>'form-horizontal','method'=>'PUT','files'=>true])}}
        @endif
        <div class="form-group">
            <label class="control-label">Product information</label>
        </div>
        <div class="form-group @if($errors->first('category_id')) has-error @endif">
            <label class="control-label col-xs-2">Category</label>
            <div class="col-xs-10">
                {{Form::select('category_id',$categories,isset($product)?$product->category_id:old('category_id'),['class'=>'form-control'])}}
                @if($errors->first('category_id'))
                    <span class="help-block">{{$errors->first('category_id')}}</span>
                @endif
            </div>

        </div>
        <div class="form-group @if($errors->first('name')) has-error @endif">
            <label class="control-label  col-xs-2">Name</label>
            <div class="col-xs-10">
                {{Form::text('name',isset($product)?$product->name:old('name'),['class'=>'form-control'])}}
                @if($errors->first('name'))
                    <span class="help-block">{{$errors->first('name')}}</span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-2">Description</label>
            <div class="col-xs-10">
                <summernote-editor name="description" text="{{isset($product)?$product->description : old('description')}}"></summernote-editor>
            </div>
        </div>
        @include('backend.products.snippets.variants')
        <button class="btn btn-primary" type="submit">Save</button>
        <button class="btn btn-warning" type="reset">Reset</button>
        {{ Form::close() }}
    </div>
@endsection