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
        <label class="control-label col-xs-2">Variant Name</label>
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
    <div class="form-group @if($errors->first('product_variants.special_price')) has-error @endif">
        <label class="control-label col-xs-2">Special Price</label>
        <div class="col-xs-10">
            {{Form::number('product_variants[special_price]',old('product_variants[special_price]'),['class'=>'form-control'])}}
            @if($errors->first('product_variants.special_price'))
                <span class="help-block">{{$errors->first('product_variants.special_price')}}</span>
            @endif
        </div>
    </div>
    <div class="form-group @if($errors->first('product_variants.material')) has-error @endif">
        <label class="control-label col-xs-2">Material</label>
        <div class="col-xs-10">
            {{Form::text('product_variants[material]',old('product_variants[material]'),['class'=>'form-control'])}}
            @if($errors->first('product_variants.material'))
                <span class="help-block">{{$errors->first('product_variants.material')}}</span>
            @endif
        </div>
    </div>
    <div class="form-group @if($errors->first('product_variants.color')) has-error @endif">
        <label class="control-label col-xs-2">Color</label>
        <div class="col-xs-10">
            {{Form::text('product_variants[color]',old('product_variants[color]'),['class'=>'form-control'])}}
            @if($errors->first('product_variants.color'))
                <span class="help-block">{{$errors->first('product_variants.color')}}</span>
            @endif
        </div>
    </div>
    <div class="form-group @if($errors->first('product_variants.width')) has-error @endif">
        <label class="control-label col-xs-2">Width</label>
        <div class="col-xs-10">
            {{Form::text('product_variants[width]',old('product_variants[width]'),['class'=>'form-control'])}}
            @if($errors->first('product_variants.width'))
                <span class="help-block">{{$errors->first('product_variants.width')}}</span>
            @endif
        </div>
    </div>
    <div class="form-group @if($errors->first('product_variants.depth')) has-error @endif">
        <label class="control-label col-xs-2">Depth</label>
        <div class="col-xs-10">
            {{Form::text('product_variants[depth]',old('product_variants[depth]'),['class'=>'form-control'])}}
            @if($errors->first('product_variants.depth'))
                <span class="help-block">{{$errors->first('product_variants.depth')}}</span>
            @endif
        </div>
    </div>
    <div class="form-group @if($errors->first('product_variants.description')) has-error @endif">
        <label class="control-label col-xs-2">Description</label>
        <div class="col-xs-10">
            <summernote-editor
                name="product_variants[description]"
                text="{{old('product_variants[description]')}}"></summernote-editor>
            @if($errors->first('product_variants.description'))
                <span class="help-block">{{$errors->first('product_variants.description')}}</span>
            @endif
        </div>
    </div>
</div>