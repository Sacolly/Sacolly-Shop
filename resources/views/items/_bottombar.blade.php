<div class="bottom-bar">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-3">
                <div class="logo">
                    <a href="{{route('home_1')}}">
                        <img src="{{asset('assets/img/logo_.png')}}" alt="Logo">
                    </a>
                </div>
            </div>


            <div class="col-md-6">
                <form action="{{route('search')}}" method="post" class="searchform">
                    @csrf
                    <div class="search">
                        <input type="text" placeholder="Search" name="key">
                        <button><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>


            <div class="col-md-3">
                <div class="user">
                    <a href="wishlist.html" class="btn wishlist">
                        <i class="fa fa-heart"></i>
                        <!-- <span>(0)</span> -->
                    </a>
                    <a href="{{route('cart.index')}}" class="btn cart">
                        <i class="fa fa-shopping-cart"></i>
                        <!-- <span>(0)</span> -->
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>