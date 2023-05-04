@extends('layouts.master')
@section('content')
<div class="product-view">
    <div class="container-fluid">
        <div class="row">


            <div class="col-lg-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-view-top">
                            <div class="row">
                                <div class="col-md-4">
                                    <form action="{{route('search')}}" method="post" class="searchform">
                                        @csrf
                                        <div class="product-search">
                                            <input type="text" placeholder="Search" name="key">
                                            <button><i class="fa fa-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-4">
                                    <div class="product-short">
                                        <div class="dropdown">
                                            <div class="dropdown-toggle" data-toggle="dropdown">Category</div>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                @foreach($categories as $category)
                                                <a href="{{route('category.show',['id'=>$category->id])}}"
                                                    class="dropdown-item">{{$category['name']}}</a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach($products as $product)
                    <div class="col-md-4">
                        <div class="product-item">
                            <div class="product-title">
                                <a href="#"><?php echo substr($product['name'],0,20)?></a>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <div class="product-image">
                                <a href="product-detail.html">
                                    <img src="{{asset('./'.$product->avatar)}}" alt="Product Image">
                                </a>
                                <div class="product-action">
                                    <!-- <a href="#"><i class="fa fa-cart-plus"></i></a>
                                    <a href="#"><i class="fa fa-heart"></i></a> -->
                                    <a href="{{route('products.show',['id'=>$product->id])}}"><i
                                            class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-price">
                                <h3><span></span><?php echo number_format($product['price']);?></h3>
                                <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- Pagination Start -->
            </div>



            <!-- Side Bar Start -->
            <div class="col-lg-4 sidebar">
                <div class="sidebar-widget category">
                    <h2 class="title">Category</h2>
                    <nav class="navbar bg-light">
                        <ul class="navbar-nav">
                            @foreach($categories as $category)
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('category.show',['id'=>$category->id])}}"><i
                                        class="fa fa-female"></i>{{$category['name']}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </nav>
                </div>

                <div class="sidebar-widget widget-slider">
                    <div class="sidebar-slider normal-slider">
                        @foreach($products as $product)

                        <div class="product-item">
                            <div class="product-title">
                                <a href="#">{{$product['name']}}</a>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                            <div class="product-image">
                                <a href="product-detail.html">
                                    <img src="{{asset('./'.$product->avatar)}}" alt="Product Image">
                                </a>
                                <div class="product-action">
                                    <!-- <a href="#"><i class="fa fa-cart-plus"></i></a>
                                    <a href="#"><i class="fa fa-heart"></i></a> -->
                                    <a href="{{route('products.show',['id'=>$product->id])}}"><i
                                            class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-price">
                                <h3><span>VNĐ</span><?php echo number_format($product['price']);?></h3>
                                <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- 
                <div class="sidebar-widget brands">
                    <h2 class="title">Our Brands</h2>
                    <ul>
                        <li><a href="#">Nulla </a><span>(45)</span></li>
                        <li><a href="#">Curabitur </a><span>(34)</span></li>
                        <li><a href="#">Nunc </a><span>(67)</span></li>
                        <li><a href="#">Ullamcorper</a><span>(74)</span></li>
                        <li><a href="#">Fusce </a><span>(89)</span></li>
                        <li><a href="#">Sagittis</a><span>(28)</span></li>
                    </ul>
                </div> -->

                <div class="sidebar-widget tag">
                    <h2 class="title">Category</h2>
                    @foreach($categories as $category)

                    <a href="{{route('category.show',['id'=>$category->id])}}">{{$category['name']}}</a>
                    @endforeach

                </div>
            </div>
            <!-- Side Bar End -->
        </div>
    </div>
</div>
@endsection