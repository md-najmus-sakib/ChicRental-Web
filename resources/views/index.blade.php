<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ChicRental</title>
    <link rel="icon" type="image" href="/image/Lg.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/css/index.css')}}">
    <script src="https://kit.fontawesome.com/8acbe8f3e0.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <!--Navigation Start-->
        <nav class="navbar navbar-expand-lg fixed-top bg-light">
            <div class="container">
                <a class="navbar-brand" href="Home.html">
                    <img style="height: 40px;" src="image/Logo.png" alt="">
                </a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item ms-5">
                            <a class="nav-link active" href="Home.html">Home</a>
                        </li>
                        <li class="nav-item dropdown ms-2">
                            <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Men
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="GroomSherwani.html">Groom Shrewani</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="GroomHaldi.html">Groom Haldi Dress</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="Pagri.html">Groom Pagri</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="MenShoes.html">Shoes</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown ms-2">
                            <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Women
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="Lehenga.html">Bridal Lehenga</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="BridalSaree.html">Bridal Saree</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="ReceptionSaree.html">Reception Saree</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="Ornaments.html">Ornaments</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="WomenShoes.html">Shoes</a></li>
                            </ul>
                        </li>
                        <li class="nav-item ms-2 me-5">
                            <a class="nav-link active" href="CoupleDress.html">Couple Derss</a>
                        </li>
                    </ul>
                </div>
                <div class="d-flex">
                    <div class="me-2">
                        <a href="Login.html"><button class="btn rounded-3 p-1 px-2" type="button"><b><i
                                        class="fa-solid fa-cart-shopping"></i> Login</b></button></a>
                    </div>
                    <p>|</p>
                    <div class="ms-2">
                        <a href="Signup.html"><button class="btn rounded-3 p-1 px-2" type="button"><b><i
                                        class="fa-solid fa-user"></i> SignUp</b></button></a>
                    </div>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
        <!--Navigation End-->
        <!-- slide start -->
        <section class="pt-5 mt-2">
            <div id="carouselExampleCaptions" class="container carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img style="height: 700px;" src="image/index/SliderImage01.jpg" class="cover-img d-block w-100"
                            alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h1>Women Haldi Dress</h1>
                            <p>It's a very good quality haldi dress for women</p>
                            <div class="btn btn-primary">Check it Out</div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img style="height: 700px;" src="image/index/SliderCouple.jpg" class="cover-img d-block w-100"
                            alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h1>Couple Combo Dress</h1>
                            <p>It's are very good quality couple combo dress</p>
                            <div class="btn btn-primary">Check it Out</div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img style="height: 700px;" src="image/index/SliderOrna03.jpg" class="cover-img d-block w-100"
                            alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h1>Ornaments</h1>
                            <p>It's a very good quality ornaments</p>
                            <div class="btn btn-primary">Check it Out</div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>
        <!-- slide end  -->
    </header>
    <main>
        <!--Top product section start  -->
        <section class="container my-5" id="shoes">
            <h3>Top Rating Product</h3>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                <div class="col">
                    <div class="card h-80 border border-0 shadow-lg">
                        <img style="height: 400px;" src="image/index/Lehan02.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Bridal Lehenga <br> Model No-02</h5>
                            <h4>Rent Price: <span style="color: brown;">7000TK</span></h4>
                        </div>
                        <div class="p-3 text-center">
                            <p>
                                <button class="btn allert" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseWidthExample1" aria-expanded="false"
                                    aria-controls="collapseWidthExample">
                                    Check it
                                </button>
                            </p>
                            <div style="min-height: 10px;">
                                <div class="collapse collapse-horizontal" id="collapseWidthExample1">
                                    <div class="card card-body" style="width: 400px;">
                                        Before order please login.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-80 border border-0 shadow-lg">
                        <img style="height: 400px;" src="image/index/Panjabi02.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Groom Sherwani<br> Model No-11</h5>
                            <h4>Rent Price: <span style="color: brown;">6000TK</span></h4>
                        </div>
                        <div class="p-3 text-center">
                            <p>
                                <button class="btn allert" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseWidthExample2" aria-expanded="false"
                                    aria-controls="collapseWidthExample">
                                    Check it
                                </button>
                            </p>
                            <div style="min-height: 10px;">
                                <div class="collapse collapse-horizontal" id="collapseWidthExample2">
                                    <div class="card card-body" style="width: 400px;">
                                        Before order please login.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-80 border border-0 shadow-lg">
                        <img style="height: 400px;" src="image/index/CoupleDerss.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Couple Dress <br> Model No-03</h5>
                            <h4>Rent Price: <span style="color: brown;">11000TK</span></h4>
                        </div>
                        <div class="p-3 text-center">
                            <p>
                                <button class="btn allert" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseWidthExample3" aria-expanded="false"
                                    aria-controls="collapseWidthExample">
                                    Check it
                                </button>
                            </p>
                            <div style="min-height: 10px;">
                                <div class="collapse collapse-horizontal" id="collapseWidthExample3">
                                    <div class="card card-body" style="width: 400px;">
                                        Before order please login.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-80 border border-0 shadow-lg">
                        <img style="height: 400px;" src="image/index/Orna02.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Ornaments <br> Model No-03</h5>
                            <h4>Rent Price: <span style="color: brown;">19000TK</span></h4>
                        </div>
                        <div class="p-3 text-center">
                            <p>
                                <button class="btn allert" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseWidthExample4" aria-expanded="false"
                                    aria-controls="collapseWidthExample">
                                    Check it
                                </button>
                            </p>
                            <div style="min-height: 10px;">
                                <div class="collapse collapse-horizontal" id="collapseWidthExample4">
                                    <div class="card card-body" style="width: 400px;">
                                        Before order please login.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-80 border border-0 shadow-lg">
                        <img style="height: 400px;" src="image/index/Pagri.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Groom Pagri <br> Model No-01</h5>
                            <h4>Rent Price: <span style="color: brown;">4000TK</span></h4>
                        </div>
                        <div class="p-3 text-center">
                            <p>
                                <button class="btn allert" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseWidthExample5" aria-expanded="false"
                                    aria-controls="collapseWidthExample">
                                    Check it
                                </button>
                            </p>
                            <div style="min-height: 10px;">
                                <div class="collapse collapse-horizontal" id="collapseWidthExample5">
                                    <div class="card card-body" style="width: 400px;">
                                        Before order please login.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 border border-0 shadow-lg">
                        <img style="height: 350px;" src="image/index/Sari01.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Bridal Saree <br> Model No-03</h5>
                            <h4>Rent Price: <span style="color: brown;">7500TK</span></h4>
                        </div>
                        <div class="p-3 text-center">
                            <p>
                                <button class="btn allert" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseWidthExample6" aria-expanded="false"
                                    aria-controls="collapseWidthExample">
                                    Check it
                                </button>
                            </p>
                            <div style="min-height: 10px;">
                                <div class="collapse collapse-horizontal" id="collapseWidthExample6">
                                    <div class="card card-body" style="width: 400px;">
                                        Before order please login.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Top product section end -->
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
</body>

</html>