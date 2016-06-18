<div class="container">
    <div class="row">
        @foreach($products as $product)
            @if(!is_null($product->variants()->first()))
            <div class="col-sm-3 product-item">
                <a href="{{route('category.{category}.product.show',[$category->id,$product->id])}}" target="_blank">
                    <div class="thumbnail"  style="min-height: 250px">
                        @if($product->variants()->first()->images()->first())
                            <img alt="" src="/storage/product/{{$product->variants()->first()->images()->first()}}.jpg">
                        @else
                            <img alt="" src="http://placehold.it/150x150.png">
                        @endif
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
    <div class="row">
        {!! $products->links() !!}
    </div>
</div>