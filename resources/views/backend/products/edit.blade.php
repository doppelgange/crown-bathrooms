@extends('layouts.backend.leftcol',['vueView'  => 'BackendProductEdit'])

@section('content')
    <h3 class="page-header">
        @if($view =='create') Create @else Edit @endif Product
        <a href="{{route('backend.product.index')}}"  class="btn btn-primary pull-right">Back to product list</a>
    </h3>
    <div class="container">
        @if($view =='create')
            {{Form::open(['route'=>'backend.product.store','class'=>'form-horizontal','method'=>'POST','files'=>true])}}
        @else
            {{Form::open(['route'=>['backend.product.update',$product->id],'class'=>'form-horizontal','method'=>'PUT','files'=>true])}}
        @endif
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
            <label class="control-label  col-xs-2">Image</label>
            <div class="col-xs-10">
                @if(isset($product))
                    @foreach($product->images as $image)
                        <div class="img-thumbnail">
                            <img src="{{$image->url}}"/>
                            <input name="images[]" value="{{$image->id}}" type="hidden">
                            <span class="fa fa-trash remove-image" @click="removeImage" aria-hidden="true"></span>
                        </div>
                    @endforeach
                @endif
                <upload name="images[]"></upload>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-2">Description</label>
            <div class="col-xs-10">
                <summernote-editor name="description" text="{{isset($product)?$product->description : old('description')}}"></summernote-editor>
            </div>
        </div>
        @if($view =='create')
            @include('backend.products.snippets.variant_form')
        @else
            @include('backend.products.snippets.variant_list',['variants' => $product->variants()->paginate()])
        @endif
        <button class="btn btn-primary" type="submit">Save</button>
        <button class="btn btn-warning" type="reset">Reset</button>
        @if(isset($product))
            <a href="{{route('backend.product.{product}.variant.create',$product->id)}}" target="_blank" class="btn btn-success"> Create product variant</a>
        @endif

    {{ Form::close() }}
    @if(isset($product)&&(count($product->variants)==0))
        {{Form::open(['route'=>['backend.product.destroy',$product->id],'class'=>'form-horizontal','method'=>'DELETE'])}}
            <button class="btn btn-danger" type="submit">Delete</button>
        {{ Form::close() }}
    @endif

</div>
@endsection