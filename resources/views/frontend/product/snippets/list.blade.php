<div class="no-gutter clearfix">
@foreach($products as $product)
    @if(!is_null($product->variants()->first()))
    <div class="col-sm-3 product-item">
        <a href="{{route('category.{category}.product.show',[$product->category->id,$product->id])}}" target="_blank">
            <div class="thumbnail"  style="min-height: 250px">
                <img alt="" src="{{$product->feature_image->path}}">
                <div class="caption">
                    <div class="text-center product-name">{{$product->name}}</div>
                    <div class="price text-center">
                        <span class="amount">{{$product->price}}</span>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endif
@endforeach
</div>
<div>
    {!! $products->appends(request()->except('page'))->links() !!}
</div>

