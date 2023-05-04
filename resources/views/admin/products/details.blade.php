@extends('layouts.main')
@section('content')
<ul class="list-unstyled CTAs">
    <li>
        <form action="{{route('details.create',['id'=>$id])}}" method="get">
            @csrf
            <button type="submit" class="btn btn-outline-success">Add Details</button>
        </form>
    </li>
</ul>
<table class="table table-bordered text-center" style="margin-top:20px;">
    <thead>
        <tr class="bg-dark text-light">
            <th scope="col" style="width: 50%;">Description</th>
            <th scope="col">Weight</th>
            <th scope="col">Color</th>
            <th scope="col">Setting</th>
        </tr>
    </thead>
    <tbody>
        @forelse($detail as $details)

        <tr>
            <td><?php echo substr($details['description'],0,200)?></td>
            <td>{{$details['weight']}} (g)</td>
            <td>{{$details['color']}}</td>

            <td>
                <a href="{{route('details.edit',['id'=>$details['id'],'id_product'=>$id])}}" class="btn btn-success">Update</a>
                <a href="{{route('details.delete',['id'=>$details['id']])}}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4">
                <ul class="list-unstyled CTAs">
                    <li>
                        <form action="{{route('details.create',['id'=>$id])}}" method="get">
                            @csrf
                            <button type="submit" class="btn btn-outline-success">Add Details</button>
                        </form>
                    </li>
                </ul>
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection