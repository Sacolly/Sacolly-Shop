<?php

use App\Models\User;

$users = User::select('*')
->join('role','users.role_id','=','role.id')
->where('role_id','!=',2)->get();


?>

<div class="review">
    <div class="container-fluid">
        <div class="row align-items-center review-slider normal-slider">

            @foreach($users as $user)
            <div class="col-md">
                <div class="review-slider-item">
                    <div class="review-img">
                        <img src="{{asset('./'.$user->avatar)}}" alt="Image">
                    </div>
                    <div class="review-text">
                        <h2>{{$user['name']}}</h2>
                        <h3>{{$user['name_role']}}</h3>
                        <div class="ratting">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vitae nunc eget leo
                            finibus luctus et vitae lorem
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>