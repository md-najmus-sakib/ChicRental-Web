<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm py-2">
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
                        <li><a class="dropdown-item" href="#">Suit</a></li>
                        <li><a class="dropdown-item" href="#">Sherwani</a></li>
                        <li><a class="dropdown-item" href="#">Kurta</a></li>
                    </ul>
                </li>
                <!-- Women Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="womenDropdown" role="button" data-bs-toggle="dropdown">Women</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Saree</a></li>
                        <li><a class="dropdown-item" href="#">Gown</a></li>
                        <li><a class="dropdown-item" href="#">Jewellery</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="#">Couple Dress</a></li>
                <!-- Extra Features -->
                <li class="nav-item"><a class="nav-link" href="#">Track Order</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Offers</a></li>
                <li class="nav-item"><a class="nav-link" href="#">FAQ</a></li>
            </ul>
            <ul class="navbar-nav mb-2 mb-lg-0 align-items-center">
                <!-- Cart Icon with badge -->
                <li class="nav-item me-3">
                    <a class="nav-link position-relative" href="#">
                        <i class="fa-solid fa-cart-shopping fa-lg"></i>
                        
                    </a>
                </li>
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
                    <a class="nav-link fw-bold signup-hover" href="{{ route('register') }}">
                        <i class="fa-solid fa-user"></i> SignUp
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Inline CSS for hover effect -->
    <style>
        
    </style>
</nav>
