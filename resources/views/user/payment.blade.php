@extends('layouts.master')
@section('content')

<ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
            role="tab" aria-controls="home" aria-selected="true">MOMO</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
            role="tab" aria-controls="profile" aria-selected="false">E-banking</button>
    </li>
    <!-- <li class="nav-item" role="presentation">
        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button"
            role="tab" aria-controls="contact" aria-selected="false">Paypal</button>
    </li> -->
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="row ">
            <div class="col-lg-3 col-sm-12 d-flex justify-content-center">
                <img src="{{asset('images/payment/payment.jpg')}}" width="90%" alt="">
            </div>
            <div class="col-lg-4 col-sm-12 justify-content-start">
                <div class="pt-5">
                    <h3>{{$payment->name}}</h3>
                    <table border="1">
                        <thead align="center">
                            <th class="col-3">Số lượng</th>
                            <th class="col-5">Giá</th>
                            <th class="col-5">Total</th>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td>{{$payment->quantity}}</td>
                                <td><?php echo number_format($payment->price)?> VNĐ</td>
                                <td><?php echo number_format($payment->quantity *$payment->price)?> VNĐ</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="pt-2 pb-2">
                        <form action="{{route('cart.order',['id'=>$payment->id])}}" method="post">
                            @csrf
                            <input type="hidden" name="quantity" value="{{$payment->quantity}}">
                            <button type="submit" class="btn">Order</button>
                        </form>
                    </div>
                    <div class="mt-5">
                        <h5 class="text-danger">
                            *Note: 
                            <small>
                            <p class="text-dark">Bước 1 : Nhập số tiền thanh toán (<?php echo number_format($payment->quantity *$payment->price)?> VNĐ)</p>
                            <p class="text-dark">Bước 2 : Nhập lời nhắn (gồm: số điện thoại, email tài khoản đăng kí, Tên tài khoản)</p>
                            <p class="text-dark">Bước 3 : Nhấn Order</p>
                            </small>
                        </h5>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <div class="row ">
            <div class="col-lg-3 col-sm-12 d-flex justify-content-center">
                <img src="{{asset('images/payment/payment-1.jpg')}}" width="90%" alt="">
            </div>
            <div class="col-lg-4 col-sm-12 justify-content-start">
                <div class="pt-5">
                    <h3>{{$payment->name}}</h3>
                    <table border="1">
                        <thead align="center">
                            <th class="col-3">Số lượng</th>
                            <th class="col-5">Giá</th>
                            <th class="col-5">Total</th>
                        </thead>
                        <tbody>
                            <tr align="center">
                                <td>{{$payment->quantity}}</td>
                                <td><?php echo number_format($payment->price)?> VNĐ</td>
                                <td><?php echo number_format($payment->quantity *$payment->price)?> VNĐ</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="pt-2 pb-2">
                        <form action="{{route('cart.order',['id'=>$payment->id])}}" method="post">
                            @csrf
                            <input type="hidden" name="quantity" value="{{$payment->quantity}}">
                            <button type="submit" class="btn">Order</button>
                        </form>
                    </div>
                    <div class="mt-5">
                        <h5 class="text-danger">
                            *Note: 
                            <small>
                            <p class="text-dark">Bước 1 : Nhập số tiền thanh toán (<?php echo number_format($payment->quantity *$payment->price)?> VNĐ)</p>
                            <p class="text-dark">Bước 2 : Nhập lời nhắn (gồm: số điện thoại, email tài khoản đăng kí, Tên tài khoản)</p>
                            <p class="text-dark">Bước 3 : Nhấn Order</p>
                            </small>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div> -->
</div>


@endsection