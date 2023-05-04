@extends('layouts.main')
@section('content')
<ul class="list-unstyled CTAs">
    <li>
        <form action="{{route('products.create')}}" method="get">
            @csrf
            <button type="submit" class="btn btn-outline-success">Add Products</button>
        </form>
    </li>
</ul>
<table class="table table-bordered text-center" style="margin-top:20px;">
    <thead>
        <tr class="bg-dark text-light">
            <th scope="col">Logo</th>
            <th scope="col">Name</th>
            <th scope="col">Images</th>
            <th scope="col">Setting</th>
        </tr>
    </thead>
    <tbody>
        @forelse($products as $product)

        <tr>
            <td><img src="{{$product['avatar']}}" height="50px"></td>
            <td>{{$product['name']}}</td>
            <td> <a href="{{route('images.index',['id'=>$product['id']])}}" class="btn btn-warning">See images</a> </td>
            <td>
                <a href="{{route('details.index',['id'=>$product['id']])}}" class="btn btn-warning">See Detail</a>
                <a href="{{route('products.edit',['id'=>$product['id']])}}" class="btn btn-success">Update</a>
                <a href="{{route('products.delete',['id'=>$product['id']])}}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="3">
                <ul class="list-unstyled CTAs">
                    <li>
                        <form action="{{route('products.create')}}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-outline-success">Add Products</button>
                        </form>
                    </li>
                </ul>
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection