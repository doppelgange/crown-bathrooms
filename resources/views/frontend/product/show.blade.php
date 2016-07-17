@extends('layouts.frontend.default')
@section('main')
    @include('frontend.product.snippets.breadcrumb')
    <section class="content products">
        <div class="container">
            <article class="product-item product-single">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="product-carousel-wrapper">
                            <div id="product-carousel" class="owl-carousel owl-theme owl-loaded">
                                <div class="owl-stage-outer">
                                    <div>
                                        {{--@if(count($product->images)>0)--}}
                                            {{--@foreach($product->images as $image)--}}
                                            {{--<div class="owl-item cloned" style="width: 355px; margin-right: 0px;">--}}
                                                {{--<div class="item"><img src="{{$image->url}}" class="img-responsive" alt=""></div>--}}
                                            {{--</div>--}}
                                            {{--@endforeach--}}
                                        {{--@else--}}
                                            <div>
                                                <div class="item"><img src="http://placehold.it/500x500.png" class="img-responsive" alt=""></div>
                                            </div>
                                        {{--@endif--}}
                                    </div>
                                </div>
                                <div class="owl-controls">
                                    <div class="owl-nav">
                                        <div class="owl-prev" style="display: none;">prev</div>
                                        <div class="owl-next" style="display: none;">next</div>
                                    </div>
                                    <div class="owl-dots" style="">
                                        <div class="owl-dot"><span></span></div>
                                        <div class="owl-dot"><span></span></div>
                                        <div class="owl-dot"><span></span></div>
                                        <div class="owl-dot active"><span></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="product-body">
                            {{--<h3>{{$product->name}}</h3>--}}
                            <span class="price">
                                <span class="amount">{{$product->price or ' Pirice is not available'}}</span>
                            </span>
                            <ul class="list-unstyled product-info">
                                <li class="form-inline">
                                    <label class="form-label">Product variant:</label>
                                    {{Form::select('variant_id',$variants,isset($variant_id)?$variant_id:old('variant_id'),['class'=>'form-control'])}}
                                </li>
                                <li><label>Code:</label> {{$product->code}}</li>
                                <li><label>Category:</label> {{$product->category->name}}</li>
                                <li><label>Material:</label> {{$product->material}}</li>
                                <li><label>Color:</label> {{$product->color}}</li>
                                <li><label>Width:</label> {{$product->width}}</li>
                                <li><label>Depth:</label> {{$product->depth}}</li>
                            </ul>
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
                        <h1>General Description</h1>
                        {!! $product->description !!}
                        <h2>Product Variant description</h2>
                        @foreach($product->variants as $variant)
                            @if(!empty($variant->description))
                                <h1>{!! $variant->name !!}</h1>
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
                            <a href="#" class="btn btn-xs btn-success"><i class="fa fa-heart"></i>Add to selector</a>
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