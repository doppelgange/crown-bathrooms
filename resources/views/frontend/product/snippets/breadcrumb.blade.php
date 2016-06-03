<section class="breadcrumb-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-xs-6">
                <h2>{{$category->name}}</h2>
                <p>{{$category->description}}</p>
            </div>
            <div class="col-xs-6">
                <ol class="breadcrumb">
                    <li><a href="/">Home</a></li>
                    @foreach($category->getParentCategoryRecursively('object') as $parentCategory)
                    <li>{{link_to_route('category.{category}.product.index',$parentCategory->name,$parentCategory->id)}}</li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
</section>