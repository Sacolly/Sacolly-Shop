<?php

use App\Models\Categories;
use App\Models\Products;

$products = Products::paginate('5');
$categories = Categories::all();
?>
<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>
<div class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <nav class="navbar bg-light">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('home_1')}}"><i class="fa fa-home"></i>Home</a>
                        </li>
                        @foreach($categories as $category)
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('category.show',['id'=>$category->id])}}"><img src="{{asset($category->avatar)}}" width="30px" alt=""></i>{{$category['name']}}</a>
                        </li>
                        @endforeach
                    </ul>
                </nav>
            </div>
            <div class="col-md-6">
                <div class="header-slider normal-slider">
                    @foreach($products as $product)
                    <div class="header-slider-item"> 
                        <img src="{{asset($product['avatar'])}}" width="100%" height="300px" alt="Slider Image" />

                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-3">
            </div>
        </div>
    </div>
</div>