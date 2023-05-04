@extends('layouts.master')
@section('content')
<div class="my-account">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                    <!-- <a class="nav-link active" id="dashboard-nav" data-toggle="pill" href="#dashboard-tab" role="tab"><i
                            class="fa fa-tachometer-alt"></i>Dashboard</a> -->
                    <a class="nav-link active" id="orders-nav" data-toggle="pill" href="#orders-tab" role="tab"><i
                            class="fa fa-shopping-bag"></i>Orders</a>
                    <!-- <a class="nav-link" id="payment-nav" data-toggle="pill" href="#payment-tab" role="tab"><i
                            class="fa fa-credit-card"></i>Payment Method</a> -->
                    <a class="nav-link" id="address-nav" data-toggle="pill" href="#address-tab" role="tab"><i
                            class="fa fa-map-marker-alt"></i>address</a>
                    <!-- <a class="nav-link" id="account-nav" data-toggle="pill" href="#account-tab" role="tab"><i
                            class="fa fa-user"></i>Account Details</a> -->
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                    <!-- <div class="tab-pane fade show " id="dashboard-tab" role="tabpanel"
                        aria-labelledby="dashboard-nav">
                        <h4>Dashboard</h4>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum quam ac mi viverra
                            dictum. In efficitur ipsum diam, at dignissim lorem tempor in. Vivamus tempor hendrerit
                            finibus. Nulla tristique viverra nisl, sit amet bibendum ante suscipit non. Praesent in
                            faucibus tellus, sed gravida lacus. Vivamus eu diam eros. Aliquam et sapien eget arcu
                            rhoncus scelerisque.
                        </p>
                    </div> -->

                    <div class="tab-pane fade show active" id="orders-tab" role="tabpanel" aria-labelledby="orders-nav">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Amount</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Color</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        use App\Models\Cart;
                                        $orders = Cart::select('products.name','products.price','products.avatar','cart.quantity','cart.id','cart.status','cart.id_product','product_detail.color')
                                        ->join('products','products.id','=','cart.id_product')
                                        ->join('product_detail','product_detail.id','=','cart.id_detail')
                                        ->where('status','!=',0)
                                        ->where('id_user','=',auth()->user()->id)
                                        ->orderby('id','Desc')
                                        ->paginate(5);
                                    ?>
                                    @forelse($orders as $order)
                                    <tr>
                                        <td>{{$order->quantity}}</td>
                                        <td><img src="{{asset($order->avatar)}}" width="20%" alt=""></td>
                                        <td>{{$order->name}}</td>
                                        <td>{{$order->color}}</td>
                                        <td><?php echo number_format($order->price)?> VNĐ</td>
                                        <td><?php echo number_format($order->price * $order->quantity)?> VNĐ</td>
                                        <td><?php 
                                        if ($order->status == 1) {
                                            echo 'browsing';
                                        }else{
                                            echo 'success';
                                        }
                                        
                                        
                                        ?></td>

                                        <td>
                                            <a href="">
                                            <button class="btn">View</button>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                            {{$orders->links()}}
                        </div>
                    </div>

                    <!-- <div class="tab-pane fade" id="payment-tab" role="tabpanel" aria-labelledby="payment-nav">
                        <h4>Payment Method</h4>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum quam ac mi viverra
                            dictum. In efficitur ipsum diam, at dignissim lorem tempor in. Vivamus tempor hendrerit
                            finibus. Nulla tristique viverra nisl, sit amet bibendum ante suscipit non. Praesent in
                            faucibus tellus, sed gravida lacus. Vivamus eu diam eros. Aliquam et sapien eget arcu
                            rhoncus scelerisque.
                        </p>
                    </div> -->
                    <div class="tab-pane fade" id="address-tab" role="tabpanel" aria-labelledby="address-nav">
                        <h4>Address</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Payment Address</h5>
                                <p>123 Payment Street, Los Angeles, CA</p>
                                <p>Mobile: 012-345-6789</p>
                                <button class="btn">Edit Address</button>
                            </div>
                            <div class="col-md-6">
                                <h5>Shipping Address</h5>
                                <p>123 Shipping Street, Los Angeles, CA</p>
                                <p>Mobile: 012-345-6789</p>
                                <button class="btn">Edit Address</button>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="tab-pane fade" id="account-tab" role="tabpanel" aria-labelledby="account-nav">
                        <h4>Account Details</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <input class="form-control" type="text" placeholder="First Name">
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="text" placeholder="Last Name">
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="text" placeholder="Mobile">
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="text" placeholder="Email">
                            </div>
                            <div class="col-md-12">
                                <input class="form-control" type="text" placeholder="Address">
                            </div>
                            <div class="col-md-12">
                                <button class="btn">Update Account</button>
                                <br><br>
                            </div>
                        </div>
                        <h4>Password change</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <input class="form-control" type="password" placeholder="Current Password">
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="text" placeholder="New Password">
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="text" placeholder="Confirm Password">
                            </div>
                            <div class="col-md-12">
                                <button class="btn">Save Changes</button>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection