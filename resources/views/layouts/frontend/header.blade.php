<style>
    .dropdown .dropdown-menu{
        display: none;
    }
    .dropdown:hover .dropdown-menu {
        display: block;
        opacity: 1;
    }
</style>
<div class="container">
    <div class="col-md-12">
        <!-- header Nav Start -->
        <nav class="navbar navbar-default yamm" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">
                        <img src="/img/logo.png" alt="Logo">
                    </a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="menu">
                    <ul class="nav navbar-nav navbar-right">
                        @foreach($rootCategories as $rootCategory)
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                                {{$rootCategory->name}}<b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu animated fadeIn">
                                <li>
                                    <div class="yamm-content container">
                                            @foreach($rootCategory->subCategories as $subCategory)
                                                <div class="col-xs-3 thumbnail-wrap">
                                                    <div class="thumbnail">
                                                        <a href="{{route('category.{category}.product.index',[$subCategory->id])}}" target="_blank">
                                                            <img alt="260x130" src="{{$subCategory->image_url}}">
                                                            <div class="caption">
                                                                <span>{{$subCategory->name}}</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                </li>
                            </ul>
                        </li>
                        @endforeach
                        <li><a href="http://www.trademe.co.nz/stores/crown-bathrooms" target="_blank">Outlet</a></li>
                        <li><a href="#">Catalog</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </div>
</div>
