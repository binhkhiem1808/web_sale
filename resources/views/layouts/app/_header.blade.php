<nav style="background-color: #fff !important" class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('index') }}">CHANEL SHOP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class=" collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a target="_blank" class="nav-link active" aria-current="page" href="https://www.chanel.com/us/fashion/news.html">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('user/product/index ') }}">Product</a>
                </li>
                <li class="nav-item">
                    <a target="_blank" class="nav-link active" aria-current="page" href="https://www.chanel.com/vn/thoi-trang/">Fashion</a>
                </li>
                <li class="nav-item">
                    <a target="_blank" class="nav-link active" aria-current="page" href="https://www.chanel.com/us/about-chanel/the-history/">About us</a>
                </li>
            </ul>


            @if (Auth::check())
            <ul class="navbar-nav">
            
                <form action="{{url('/user/search')}}" method="get" class="form-inline">
                    {{-- {{ csrf_field() }} --}}
                    <div class="form-group">
                        <input type="text" name="key" placeholder="Search By Namek">
                    </div>
            
                    <button type="submit">
                        <i class="ti-search"></i>
                    </button>
                </form>
                <li><a href="{{url("/user/cart")}}"><i style="font-size: 20px;" class="ti-shopping-cart"><sup>{{ !is_null(\Session::get('carts')) ? count(\Session::get('carts')) : 0 }}</sup></i></a></li>
                {{-- <li><a href="{{url("/user/cart")}}"><i style="font-size: 28px;" class="ti-shopping-cart"><sup>2</sup></i></a></li> --}}
            
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i style="font-size: 20px;" class="ti-user"></i>
                    </a>
            
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ url('profile') }}">Profile</a></li>
                        <li><a class="dropdown-item" href="">Category</a></li>
                        <li><a class="dropdown-item" href="">Settings</a></li>
            
                        <li>
                            <a class="dropdown-item" href="#" onclick="document.getElementById('logout-form').submit()">Log out</a>
                            <form action="{{ url('/logout') }}" method="post" id="logout-form">
                                @csrf
            
            
                            </form>
                        </li>
                    </ul>
                </div>
            </ul>
            @else
            
            
            
            
            
            <ul class="navbar-nav">
            
                <form action="{{url('/user/search')}}" method="get" class="form-inline">
                    {{-- {{ csrf_field() }} --}}
                    <div class="form-group">
                        <input type="text" name="key" placeholder="Search By Namek">
                    </div>
            
                    <button type="submit">
                        <i class="ti-search"></i>
                    </button>
                </form>
                <li><a href="{{url("/user/cart")}}"><i style="font-size: 20px;" class="ti-shopping-cart"><sup>{{ !is_null(\Session::get('carts')) ? count(\Session::get('carts')) : 0 }}</sup></i></a></li>
                {{-- <li><a href="{{url("/user/cart")}}"><i style="font-size: 28px;" class="ti-shopping-cart"><sup>2</sup></i></a></li> --}}
                <li class="nav-item">
                    <a href="{{ url('login') }}">
                        <i class="ti-user"></i></a>
                </li>
            </ul>
            @endif
        </div>
    </div>
</nav>
