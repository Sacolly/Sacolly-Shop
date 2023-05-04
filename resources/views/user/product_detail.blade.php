@extends('layouts.master')
@section('content')
<div class="product-detail">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="product-detail-top">
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <div class="product-slider-single normal-slider">
                                <img src="{{asset('./'.$product['avatar'])}}" alt="Product Image">
                                @foreach($images as $image)
                                <img src="{{asset('./'.$image->images)}}" alt="Product Image">
                                @endforeach
                            </div>
                            <div class="product-slider-single-nav normal-slider">
                                <div class="slider-nav-img"><img src="{{asset('./'.$product->avatar)}}"
                                        alt="Product Image"></div>
                                @foreach($images as $image)
                                <div class="slider-nav-img"><img src="{{asset('./'.$image->images)}}"
                                        alt="Product Image"></div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-7">
                            <form action="{{route('cart.store')}}" method="post">
                                @csrf
                                <div class="product-content">
                                    <div class="title">
                                        <h2>{{$product->name}}</h2>
                                    </div>
                                    <div class="ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="price">
                                        <h4>Price:</h4>
                                        <p><?php echo number_format($product->price)." VNĐ"?><span></span></p>
                                    </div>
                                    <div class="quantity">
                                        <h4>Quantity:</h4>
                                        <div class="qty">
                                            <p class="btn btn-minus "><i class="fa fa-minus"></i></p>
                                            <input type="text" value="1" name="quantity">
                                            <p class="btn btn-plus"><i class="fa fa-plus"></i></p>
                                        </div>
                                    </div>
                                    <div class="p-color">
                                        <h4>Color:</h4>
                                        <div class="btn-group btn-group-sm">
                                            <select id="role" class="form-control" required name="color">
                                                <option value="">- - Choose Color - -</option>
                                                @forelse($details as $detail)
                                                <option value="{{$detail['id']}}">{{$detail['color']}}</option>
                                                @empty
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="action">
                                        @guest
                                        @if (Route::has('login'))
                                        <a class="btn" href="{{ route('login') }}"><i
                                                class="fa fa-shopping-cart"></i>Add to Cart</a>
                                        <a class="btn" href="{{ route('login') }}"><i class="fa fa-shopping-bag"></i>Buy
                                            Now</a>
                                        @endif
                                        @else
                                        <input type="hidden" value="{{auth()->user()->id}}" name="id_user">
                                        <input type="hidden" value="{{$product->id}}" name="id_product">
                                        <button type="submit" class="btn"><i class="fa fa-shopping-cart"></i> Add to
                                            Cart</button>
                                        @endguest
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="product">
                    <div class="section-header">
                        <h1>Related Products</h1>
                    </div>

                    <div class="row align-items-center product-slider product-slider-3">
                        @foreach($products as $product)
                        <div class="col-lg">
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
                                    <h3><?php echo number_format($product->price)?></h3>
                                    <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Side Bar Start -->
            <div class="col-lg-4 sidebar">
                <div class="sidebar-widget category">
                    <h2 class="title">Category</h2>
                    <nav class="navbar bg-light">
                        <ul class="navbar-nav">
                            @foreach($categories as $category)
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('category.show',['id'=>$category->id])}}"><img src="{{asset($category->avatar)}}" width="30px"
                                        alt="">{{$category['name']}}</a>
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
                                    <img src="{{asset($product->avatar)}}" alt="Product Image">
                                </a>
                                <div class="product-action">
                                    <!-- <a href="#"><i class="fa fa-cart-plus"></i></a>
                                    <a href="#"><i class="fa fa-heart"></i></a> -->
                                    <a href="{{route('products.show',['id'=>$product->id])}}"><i
                                            class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-price">
                                <h3><?php echo number_format($product->price)?><span> VNĐ</span></h3>
                                <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>

                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="sidebar-widget tag">
                    <h2 class="title">Tags Cloud</h2>

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