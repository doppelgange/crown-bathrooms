<section class="breadcrumb-wrapper">
    <div class="container">
        <div class="row">
            <ol class="breadcrumb col-xs-8">
                <li><a href="/">Home</a></li>
                @if(isset($category))
                    @foreach($category->getParentCategoryRecursively('object') as $parentCategory)
                        <li>{{link_to_route('category.{category}.product.index',$parentCategory->name,$parentCategory->id)}}</li>
                    @endforeach
                    @if(isset($product))
                        <li>{{$product->name}} </li>
                    @endif
                @endif
            </ol>
            <div class="col-xs-4">
                <form action="/product/search" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for products..." name="query">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>