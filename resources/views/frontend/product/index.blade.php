@extends('layouts.frontend.default')
@section('main')
    @include('frontend.product.snippets.breadcrumb')
    <div class="container">
        <div class="row">
            <div class="col-md-3 product-sidebar">
                @foreach($categories as $firstLevelCategory)
                    <h3 class="sidebar level1">
                        {{link_to_route('category.{category}.product.index',$firstLevelCategory->name,['category'=>$firstLevelCategory->id] )}}
                    </h3>
                    @foreach($firstLevelCategory->subCategories as $secondLevelCategory)
                        <ul>
                            <li class="level2">
                                {{link_to_route('category.{category}.product.index',$secondLevelCategory->name,['category'=>$secondLevelCategory->id] )}}
                            </li>
                            @foreach($secondLevelCategory->subCategories as $thirdLevelCategory)
                            <li class="level3">
                                {{link_to_route('category.{category}.product.index',$thirdLevelCategory->name,['category'=>$thirdLevelCategory->id] )}}
                            </li>
                            @endforeach
                        </ul>
                    @endforeach
                @endforeach
            </div>
            <div class="col-md-9">
                @include('frontend.product.snippets.list')
            </div>
        </div>
    </div>
@endsection
