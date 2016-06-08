<div class="container">
    <div class="row">
        @foreach($products as $product)
            <div class="col-sm-3 product-item">
                <a href="{{route('category.{category}.product.show',[$category->id,$product->id])}}" target="_blank">
                    <div class="thumbnail">
                        <img alt="" src="/storage/product/{{$product->id}}.jpg">
                        <div class="caption">
                            <div class="text-center product-name">{{$product->name}}</div>
                            <div class="price text-center">
                                <span class="amount">{{$product->price}}</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    <div class="row">
        {!! $products->links() !!}
    </div>
</div>