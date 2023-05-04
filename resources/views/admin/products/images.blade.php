@extends('layouts.main')
@section('content')
<ul class="list-unstyled CTAs">
    <li>
        <form action="{{route('images.create',['id'=>$id])}}" method="get">
            @csrf
            <button type="submit" class="btn btn-outline-success">Add Images</button>
        </form>
    </li>
</ul>
<table class="table table-bordered text-center" style="margin-top:20px;">
    <thead>
        <tr class="bg-dark text-light">
            <th scope="col">Image</th>
            <th scope="col">Setting</th>
        </tr>
    </thead>
    <tbody>
        @forelse($images as $image)

        <tr>
            <td><img src="{{asset('./'.$image->images)}}" width="50px" alt=""></td>

            <td>
                <a href="{{route('images.edit',['id'=>$image['id'],'id_product'=>$id])}}" class="btn btn-success">Update</a>
                <a href="{{route('images.delete',['id'=>$image['id']])}}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4">
                <ul class="list-unstyled CTAs">
                    <li>
                        <form action="{{route('images.create',['id'=>$id])}}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-outline-success">Add Images</button>
                        </form>
                    </li>
                </ul>
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection