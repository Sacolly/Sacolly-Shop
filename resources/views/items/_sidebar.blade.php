<nav id="sidebar">
    <div class="sidebar-header">
        <div class="user">
            <img src="{{asset(auth()->user()->avatar)}}">
        </div>
        <h3>{{Auth::user()->name}}</h3>
        <strong></strong>
    </div>

    <ul class="list-unstyled components" >
        <li class="active">
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"  style="text-decoration: none !important; ">
                <i class="fas fa-home"></i> Home
            </a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="{{route('turnover')}}" style="text-decoration: none !important; ">Turnover</a>
                </li>
                <li>
                    <a href="{{route('accept')}}" style="text-decoration: none !important; ">Accept</a>
                </li>
                <!-- <li>
                    <a href="#" style="text-decoration: none !important; ">Home 3</a>
                </li> -->
            </ul>
        </li>
        <!-- <li>
            <a href="#">
                <i class="fas fa-briefcase"></i> About
            </a>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-copy"></i> Pages
            </a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="#">Page 1</a>
                </li>
                <li>
                    <a href="#">Page 2</a>
                </li>
                <li>
                    <a href="#">Page 3</a>
                </li>
            </ul>
        </li> -->
        
        <li>
            <a href="{{route('account.index')}}" style="text-decoration: none !important; " >
                <i class="fas fa-users"></i> Account
            </a>
        </li>
        <li>
            <a href="{{route('categories.index')}}" style="text-decoration: none  !important; ">
                <i class="fas fa-window-maximize"></i> Categories
            </a>
        </li>
        <li>
            <a href="{{route('products.index')}}" style="text-decoration: none !important; ">
                <i class="fa fa-product-hunt" aria-hidden="true"></i> Products
            </a>
        </li>
       
        <!-- <li>
            <a href="#">
                <i class="fas fa-image"></i> Portfolio
            </a>
        </li> -->
        <!-- <li>
            <a href="#">
                <i class="fas fa-question"></i> FAQ
            </a>
        </li> -->
        <!-- <li>
            <a href="#">
                <i class="fas fa-paper-plane"></i> Contact
            </a>
        </li> -->
    </ul>
    <ul class="list-unstyled CTAs">
        <li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-outline-dark" type="submit">Log out</button>
            </form>
        </li>
    </ul>
</nav>