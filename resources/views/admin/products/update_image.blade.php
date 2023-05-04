@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update  Images') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('images.update',['id'=>$images['id'],'id_product'=>$id_product])}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right ">{{ __('Old_Avatar') }}</label>
                            <div class="col-md-4 col-form-label text-md-right border">
                            <img src="{{asset($images->images)}}" height="150px" width="150px" alt="">
                        </div>
                        <div class="form-group row">
                            <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('Images') }}</label>

                            <div class="col-md-6">
                                <input id="avatar" type="file" accept="image/*" name="avatar" required>

                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection