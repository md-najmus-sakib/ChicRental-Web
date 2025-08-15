<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm py-1">
    <div class="container">
        <a class="navbar-brand fw-bold d-flex align-items-center" href="{{ route('home') }}">
            <img src="{{asset('assets/image/logo-s.png')}}" alt="ChicRental Logo" width="140" height="35" class="me-2">
        </a>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <!-- Center Menu -->
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                <!-- Men Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="menDropdown" role="button" data-bs-toggle="dropdown">Men</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('mensuits') }}">Suit</a></li>
                        <li><a class="dropdown-item" href="{{ route('sherwani') }}">Sherwani</a></li>
                        <li><a class="dropdown-item" href="{{ route('kurta') }}">Kurta</a></li>
                    </ul>
                </li>
                <!-- Women Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="womenDropdown" role="button" data-bs-toggle="dropdown">Women</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('sarees') }}">Saree</a></li>
                        <li><a class="dropdown-item" href="{{ route('lehenga') }}">Lehenga</a></li>
                        <li><a class="dropdown-item" href="{{ route('jewellery') }}">Jewellery</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{ route('couple') }}">Couple Dress</a></li>
                <!-- Extra Features -->
                <li class="nav-item"><a class="nav-link" href="{{ route('track_order')}}">Track Order</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('offers') }}">Offers</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('faq') }}">FAQ</a></li>
            </ul>
            <!-- Search Option -->
            <form class="d-flex mx-3" action="{{ route('search') }}" method="GET" role="search">
                <div class="input-group">
                    <input class="form-control" type="search" name="q" placeholder="Search products..." aria-label="Search">
                    <button class="btn btn-danger" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </form>
            <ul class="navbar-nav mb-2 mb-lg-0 align-items-center">
                <!-- Cart Icon -->
                <li class="nav-item me-3 position-relative">
                    <a class="nav-link" href="{{ route('cart') }}">
                        <i class="fa fa-shopping-cart fa-lg"></i>
                        @if($cartCount > 0)
                        <span class="position-absolute top-1 start-100 translate-middle badge rounded-pill bg-danger">
                            {{ $cartCount }}
                        </span>
                        @endif
                    </a>
                </li>
                {{-- Authenticated User --}}
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fw-bold" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-user"></i> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('dashboard') }}">
                                    <i class="fa fa-gauge"></i> Dashboard
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                    <i class="fa fa-user-cog"></i> Profile
                                </a>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="fa fa-sign-out-alt"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <!-- Login -->
                    <li class="nav-item">
                        <a class="nav-link fw-bold login-hover" href="{{ route('login') }}">
                            <i class="fa-solid fa-right-to-bracket"></i> Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <span class="mx-2" style="font-size:1.3rem; color:#bdbdbd;">|</span>
                    </li>
                    <!-- SignUp -->
                    <li class="nav-item">
                        <a class="nav-link fw-bold signup-hover" href="{{ route('signup.form') }}">
                            <i class="fa-solid fa-user"></i> SignUp
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>