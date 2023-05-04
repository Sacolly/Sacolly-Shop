@extends('layouts.main')
@section('content')

<table class="table table-bordered text-center" style="margin-top:20px;">
    <thead>
        <tr class="bg-dark text-light">
            <th scope="col">Customer</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
            <th scope="col">Name product</th>
            <th scope="col">Total</th>
            <th scope="col">Setting</th>
        </tr>
    </thead>
    <tbody>

        @forelse($accepts as $accept)

        <tr>
            <td>{{$accept['name']}}</td>
            <td>{{$accept['phone']}}</td>
            <td>{{$accept['email']}}</td>
            <td>{{$accept['name_product']}}</td>
            <td>{{Str::currency($accept['quantity'] * $accept['price'])}}</td>
            <td>
                <form action="{{route('accept_success',['id'=>$accept->id])}}" method="post">
                    @csrf
                    <input type="hidden" name="quantity" value="{{$accept['quantity']}}">
                    <input type="hidden" name="total" value="{{$accept['quantity'] * $accept['price']}}">
                    <button type="submit" class="btn btn-success">Accept</button>

                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td>
                <h3>There are no applications to accept !! </h3>
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection