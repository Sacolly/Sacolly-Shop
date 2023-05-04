@extends('layouts.main')
@section('content')
<ul class="list-unstyled CTAs">
    @if(auth()->user()->role_id == '1')
    <li>
        <form action="{{route('account.create')}}" method="get">
            @csrf
            <button type="submit" class="btn btn-outline-success">Add Account</button>
        </form>
    </li>
    @endif
</ul>
<table class="table table-bordered text-center" style="margin-top:20px;">
    <thead>
        <tr class="bg-dark text-light">
            <th scope="col">Avatar</th>
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Address</th>
            <th scope="col">Email</th>
            <th scope="col">Setting</th>
        </tr>
    </thead>
    <tbody>
        @forelse($users as $user)

        <tr>
            <td><img src="{{$user['avatar']}}" height="40px" width="40px"></td>
            <td>{{$user['name']}}</td>
            <td>{{$user['phone']}}</td>
            <td>{{$user['address']}}</td>
            <td>{{$user['email']}}</td>
            @if($user['role_id'] != '1')
            <td>
                <a href="{{route('account.edit',['id'=>$user['id']])}}" class="btn btn-success">Update</a>
                <a href="{{route('account.delete',['id'=>$user['id']])}}" class="btn btn-danger">Delete</a>
            </td>
            @endif
        </tr>
        @empty
        <tr>
            <td>
                <ul class="list-unstyled CTAs">
                    <li>
                        <form action="{{route('account.create')}}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-outline-success">Add Account</button>
                        </form>
                    </li>
                </ul>
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection