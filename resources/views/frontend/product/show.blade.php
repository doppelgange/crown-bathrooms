@extends('layouts.frontend.default')
@section('body.before')
    <component is="FrontendProduct"
               :variants = "{{$product->variants->toJson()}}"
               inline-template>
@endsection
@section('main')
    @include('frontend.product.snippets.breadcrumb')
    <section class="content products">
        <div class="container">
            <article class="product-item product-single">
                <div class="row">
                    <div class="col-xs-6">
                        <product-image-slider
                                :images="{{json_encode($product->allImages())}}"
                                :feature-image = "'{{$product->feature_image->path}}'"
                                :current-variant-id = "currentVariantId"
                                ></product-image-slider>
                    </div>
                    <div class="col-xs-6">
                        <div class="product-body">
                            {{--<h3>{{$product->name}}</h3>--}}
                            <h3 class="product-title">@{{variant.name}}</h3>
                            <ul class="list-unstyled product-info">
                                <li>
                                    <label class="form-label">Plese choose from below options:</label>
                                </li>
                                <li>
                                    <div v-for="variant in variants"
                                         class="product-variant-option"
                                         :class="{'active': $index == selectedVariantIndex}"
                                    @click = "updateVariant($index)"
                                    >@{{variant.name}}</div>
                                </li>
                                <li><label>Code:</label> @{{variant.code}}</li>
                                <li><label>Category:</label> {{$product->category->name}}</li>
                                <li><label>Material:</label> @{{variant.material}}</li>
                                <li><label>Color:</label>@{{variant.color}}</li>
                                <li><label>Width:</label> @{{variant.width}}</li>
                                <li><label>Depth:</label> @{{variant.depth}}</li>
                            </ul>
                            <div class="price">
                                <div class="amount" v-if="variant.price>0">Price: @{{variant.price}}</div>
                                <div v-else>Price is not available</div>
                            </div>
                            <button href="#" class="btn btn-success" :disabled="buttonDisabled" @click="addToCart(variant.id,$event)">
                                <i class="fa fa-heart"></i>
                                <span v-if="!buttonDisabled">Add to selector</span>
                                <span v-else>Added to selector</span>
                            </button>
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
@section('body.after')
    </component>
@endsection