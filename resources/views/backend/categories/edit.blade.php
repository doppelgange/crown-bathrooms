@extends('layouts.backend.leftcol',['vueView'  => 'BackendCategoryEdit'])

@section('content')
    <h1 class="page-header">@if($view =='create') Create @else Edit @endif Category</h1>
    <div class="container">
        @if($view =='create')
            {{Form::open(['route'=>'backend.category.store','class'=>'form-horizontal','method'=>'POST','files'=>true])}}
        @else
            {{Form::open(['route'=>['backend.category.update',$category->id],'class'=>'form-horizontal','method'=>'PUT','files'=>true])}}
        @endif
        <div class="form-group @if($errors->first('parent_category_id')) has-error @endif">
            <label class="control-label col-xs-2">Parent Category</label>
            <div class="col-xs-10">
                {{Form::select('parent_category_id',$parentCategories,isset($category)?$category->parent_category_id:old('parent_category_id'),['class'=>'form-control'])}}
                @if($errors->first('parent_category_id'))
                    <span class="help-block">{{$errors->first('parent_category_id')}}</span>
                @endif
            </div>
        </div>
        <div class="form-group @if($errors->first('name')) has-error @endif">
            <label class="control-label  col-xs-2">Name</label>
            <div class="col-xs-10">
                {{Form::text('name',isset($category)?$category->name:old('name'),['class'=>'form-control'])}}
                @if($errors->first('name'))
                    <span class="help-block">{{$errors->first('name')}}</span>
                @endif
            </div>
        </div>
        <div class="form-group @if($errors->first('code')) has-error @endif">
            <label class="control-label col-xs-2">Code</label>
            <div class="col-xs-10">
                {{Form::text('code',isset($category)?$category->code:old('code'),['class'=>'form-control'])}}
                @if($errors->first('code'))
                    <span class="help-block">{{$errors->first('code')}}</span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-2">Description</label>
            <div class="col-xs-10">
                <summernote-editor name="description" text="{{isset($category)?$category->description : old('description')}}"></summernote-editor>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-2">Image</label>
            <div class="col-xs-10">
                @if(!empty($category))
                    <img src="{{$category->image_url}}" alt="" class="img-rounded" style="max-width: 300px">
                @endif
                {{Form::file('category_image',['accept'=>'image/*'])}}
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Save</button>
        <button class="btn btn-warning" type="reset">Reset</button>
        {{ Form::close() }}
    </div>
    </div>
@endsection

@section('footer.script.shared')
    <script src="{{ elixir("js/main.js") }}"></script>
    <script src="{{ asset("js/app.js") }}"></script>
@stop