@extends('layouts.master')
@section('content')
<div class="cart-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="cart-page-inner">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Product</th>
                                    <th>Color</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody class="align-middle">
                                @forelse($carts as $cart)
                                <tr>
                                    <div class="col-ms-6">
                                        <td>
                                            <div class="img">
                                                <a href="{{route('products.show',['id'=>$cart->id_product])}}"><img
                                                        src="{{asset($cart->avatar)}}" alt="Image"></a>
                                                <p>{{$cart->name}}</p>
                                            </div>
                                        </td>
                                        <td>
                                            {{$cart->color}}
                                        </td>
                                        <td><?php echo number_format($cart->price)?> VNĐ</td>
                                    </div>
                                    <div class="col-ms-6">
                                        <form action="{{route('payment',['id'=>$cart->id])}}" method="post">
                                            @csrf
                                            <td>
                                                <div class="qty d-flex pl-4">
                                                    <p class="btn btn-minus"><i class="fa fa-minus"></i></p>
                                                    <input type="text" name="quantity" value="{{$cart->quantity}}">
                                                    <p class="btn btn-plus"><i class="fa fa-plus"></i></p>
                                                </div>
                                            </td>
                                            <td>
                                                <button>
                                                    <i class="far fa-money-bill-alt"></i>
                                                </button>
                                            </td>
                                        </form>
                                        <td>
                                            <a href="{{route('cart.destroy',['id'=>$cart->id])}}">
                                                <button>
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </a>
                                        </td>
                                    </div>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="10">
                                        Chưa có sản phẩm nào
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection