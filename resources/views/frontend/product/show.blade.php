@extends('layouts.frontend.default',['vueView'  => 'FrontendProduct'])
@section('main')
    @include('frontend.product.snippets.breadcrumb')
    <section class="content products">
        <div class="container">
            <article class="product-item product-single">
                <div class="row">
                    <div class="col-xs-6">
                        <product-image-slider
                                :images="{{$product->images->toJson()}}"
                                :feature-image = "'{{$product->feature_image}}'"
                                ></product-image-slider>
                    </div>
                    <div class="col-xs-6">
                        <div class="product-body">
                            {{--<h3>{{$product->name}}</h3>--}}
                            <ul class="list-unstyled product-info">
                                <li class="form-inline">
                                    <label class="form-label">Product variant:</label>
                                    {{Form::select('variant_id',$variants,isset($variant_id)?$variant_id:old('variant_id'),
                                    [
                                        'class'=>'form-control',
                                    ])}}
                                </li>
                                <li><label>Code:</label> {{$product->code}}</li>
                                <li><label>Category:</label> {{$product->category->name}}</li>
                                <li><label>Material:</label> {{$product->material}}</li>
                                <li><label>Color:</label> {{$product->color}}</li>
                                <li><label>Width:</label> {{$product->width}}</li>
                                <li><label>Depth:</label> {{$product->depth}}</li>
                            </ul>
                            <span class="price">
                                <span class="amount">{{$product->price or ' Pirice is not available'}}</span>
                            </span>
                            <ul class="list-inline product-links">
                                <li><a href="#" class="btn btn-success"><i class="fa fa-heart"></i>Add to selector</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </article>

            <div class="tabs product-tabs">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#description" role="tab" data-toggle="tab" aria-controls="description" aria-expanded="false">Description</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="description">
                        {!! $product->description !!}
                        @foreach($product->variants as $variant)
                            @if(!empty($variant->description))
                                {!! $variant->description !!}
                            @endif
                        @endforeach

                    </div>
                </div>
            </div>

            @if(($product->related_products)>0)
            <div class="releated-products">
                <h2>Related Products</h2>
                <div class="row grid" id="products">
                    @foreach($product->related_products as $relatedProduct)
                    <!-- PRODUCT - START -->
                    <div class="col-sm-3 col-xs-6 product-item">
                        <img src="http://placehold.it/500x500.pn" class="img-responsive" alt="">
                        <h3>{{$relatedProduct->name}}</h3>
                        <span class="price">
                            <span class="amount">{{$relatedProduct->price}}</span>
                            <a href="#" class="btn btn-xs btn-success" @click="addSelector()"><i class="fa fa-heart"></i>Add to selector</a>
                        </span>
                    </div>
                    <!-- PRODUCT - END -->
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </section>
@endsection