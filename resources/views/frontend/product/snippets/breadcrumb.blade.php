<section class="breadcrumb-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-xs-6">
                <h2 class="breadcrumb-current">
                @if(isset($product))
                    {{$product->name}}
                @else
                    {{$category->name}}
                @endif
                </h2>

            </div>
            <div class="col-xs-6 text-right">
                <ol class="breadcrumb">
                    <li><a href="/">Home</a></li>
                    @foreach($category->getParentCategoryRecursively('object') as $parentCategory)
                        <li>{{link_to_route('category.{category}.product.index',$parentCategory->name,$parentCategory->id)}}</li>
                    @endforeach
                    @if(isset($product))
                        <li>{{$product->name}} </li>
                    @endif
                </ol>
            </div>
        </div>
    </div>
</section>