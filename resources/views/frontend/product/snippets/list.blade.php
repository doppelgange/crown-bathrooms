<div class="container">
    <div class="row">
        @foreach($products as $product)
            <div class="col-sm-3">
                <a href="{{route('category.{category}.product.show',[$category->id,$product->id])}}" target="_blank">
                    <div class="thumbnail"><img alt="" src="http://placehold.it/500x500.png">
                        <div class="caption">
                            <span>{{$product->name}}</span>
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