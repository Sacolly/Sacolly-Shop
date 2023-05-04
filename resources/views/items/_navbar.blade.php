<div class="nav">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <a href="#" class="navbar-brand">MENU</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav mr-auto">
                    <a href="{{route('home_1')}}" class="nav-item nav-link">Home</a>
                    <a href="{{route('products.user')}}" class="nav-item nav-link">Products</a>
                    @guest
                    @if (Route::has('login'))
                    @endif
                    @else
                    <a href="{{route('cart.index')}}" class="nav-item nav-link">Cart</a>
                    <a href="{{route('my_account.user')}}" class="nav-item nav-link">My Account</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">More Pages</a>
                        <div class="dropdown-menu">
                            <a href="{{route('wishlist.user')}}" class="dropdown-item">Wishlist</a>
                            <a href="{{route('contact.user')}}" class="dropdown-item">Contact Us</a>
                        </div>
                    </div>
                    @endguest
                </div>
                @guest
                @if (Route::has('login'))
                <div class="navbar-nav ml-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">User Account</a>
                        <div class="dropdown-menu">
                            <a href="{{ route('login') }}" class="dropdown-item">Login</a>
                            <a href="{{ route('register') }}" class="dropdown-item">Register</a>
                        </div>
                    </div>
                </div>
                @endif
                @else
                <li style="display: flex;">
                    <div class="mt-3 ml-3 " style="color: white;">
                        <h3>{{Auth::user()->name}}</h3>
                    </div>
                    <ul class="list-unstyled mt-3 ml-3">
                        <li class="p-1">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="btn btn-outline-dark" type="submit">Log out</button>
                            </form>
                        </li>
                    </ul>
                </li>
                @endguest
            </div>
        </nav>
    </div>
</div>