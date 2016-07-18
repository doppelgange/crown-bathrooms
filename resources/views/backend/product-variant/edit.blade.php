@extends('layouts.backend.leftcol',['vueView'  => 'BackendProductEdit'])

@section('content')
    <h3 class="page-header">
        @if($view =='create') Create @else Edit @endif Product Variant
        <div class="btn-toolbar pull-right">
            <a href="{{route('backend.product.show',$product->id)}}" class="btn btn-primary"> Back to product page</a>
            <a href="{{route('backend.product.{product}.variant.show',[$product->id,$variant->id])}}" class="btn btn-primary"> View </a>
        </div>

    </h3>
    <div class="container">
        @if($view =='create')
            {{Form::open([ 'route' =>  ['backend.product.{product}.variant.store',$product->id],'class'=>'form-horizontal','method'=>'POST','files'=>true])}}
        @else
            {{Form::open(['route'=>['backend.product.{product}.variant.update',$product->id,$variant->id],'class'=>'form-horizontal','method'=>'PUT','files'=>true])}}
        @endif
            <div class="form-group @if($errors->first('code')) has-error @endif">
                <label class="control-label col-xs-2">Code</label>
                <div class="col-xs-10">
                    {{Form::text('code',isset($variant)?$variant->code:old('code'),['class'=>'form-control'])}}
                    @if($errors->first('code'))
                        <span class="help-block">{{$errors->first('code')}}</span>
                    @endif
                </div>
            </div>
            <div class="form-group @if($errors->first('name')) has-error @endif">
                <label class="control-label col-xs-2">Variant Name</label>
                <div class="col-xs-10">
                    {{Form::text('name',isset($variant)?$variant->name:old('name'),['class'=>'form-control'])}}
                    @if($errors->first('name'))
                        <span class="help-block">{{$errors->first('name')}}</span>
                    @endif
                </div>
            </div>
            <div class="form-group @if($errors->first('price')) has-error @endif">
                <label class="control-label col-xs-2">Price</label>
                <div class="col-xs-10">
                    {{Form::number('price',isset($variant)?$variant->price:old('price'),['class'=>'form-control'])}}
                    @if($errors->first('price'))
                        <span class="help-block">{{$errors->first('price')}}</span>
                    @endif
                </div>
            </div>
            <div class="form-group @if($errors->first('special_price')) has-error @endif">
                <label class="control-label col-xs-2">Special Price</label>
                <div class="col-xs-10">
                    {{Form::number('special_price',isset($variant)?$variant->special_price:old('special_price'),['class'=>'form-control'])}}
                    @if($errors->first('special_price'))
                        <span class="help-block">{{$errors->first('special_price')}}</span>
                    @endif
                </div>
            </div>
            <div class="form-group @if($errors->first('material')) has-error @endif">
                <label class="control-label col-xs-2">Material</label>
                <div class="col-xs-10">
                    {{Form::text('material',isset($variant)?$variant->material:old('material'),['class'=>'form-control'])}}
                    @if($errors->first('material'))
                        <span class="help-block">{{$errors->first('material')}}</span>
                    @endif
                </div>
            </div>
            <div class="form-group @if($errors->first('color')) has-error @endif">
                <label class="control-label col-xs-2">Color</label>
                <div class="col-xs-10">
                    {{Form::text('color',isset($variant)?$variant->color:old('color'),['class'=>'form-control'])}}
                    @if($errors->first('color'))
                        <span class="help-block">{{$errors->first('color')}}</span>
                    @endif
                </div>
            </div>
            <div class="form-group @if($errors->first('width')) has-error @endif">
                <label class="control-label col-xs-2">Width</label>
                <div class="col-xs-10">
                    {{Form::text('width',isset($variant)?$variant->width:old('width'),['class'=>'form-control'])}}
                    @if($errors->first('width'))
                        <span class="help-block">{{$errors->first('width')}}</span>
                    @endif
                </div>
            </div>
            <div class="form-group @if($errors->first('depth')) has-error @endif">
                <label class="control-label col-xs-2">Depth</label>
                <div class="col-xs-10">
                    {{Form::text('depth',isset($variant)?$variant->depth:old('depth'),['class'=>'form-control'])}}
                    @if($errors->first('depth'))
                        <span class="help-block">{{$errors->first('depth')}}</span>
                    @endif
                </div>
            </div>
            <div class="form-group @if($errors->first('description')) has-error @endif">
                <label class="control-label col-xs-2">Description</label>
                <div class="col-xs-10">
                    <summernote-editor
                            name="description"
                            text="{{ isset($variant)?$variant->description:old('description')}}"></summernote-editor>
                    @if($errors->first('description'))
                        <span class="help-block">{{$errors->first('description')}}</span>
                    @endif
                </div>
            </div>
        <button class="btn btn-primary" type="submit">Save</button>
        <button class="btn btn-warning" type="reset">Reset</button>
        <a href="{{route('backend.product.{product}.variant.create',$product->id)}}" target="_blank" class="btn btn-success"> Create product variant</a>
            {{ Form::close() }}
        @if(isset($variant))
            {{Form::open(['route'=>['backend.product.{product}.variant.destroy',$product->id,$variant->id],'class'=>'form-horizontal','method'=>'DELETE'])}}
                <button class="btn btn-danger" type="submit">Delete</button>
            {{ Form::close() }}
        @endif
    </div>
@endsection