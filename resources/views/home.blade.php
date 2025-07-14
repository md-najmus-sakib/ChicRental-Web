@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row align-items-center mb-5">
        <div class="col-md-6 text-center text-md-start">
            <h1 class="display-3 fw-bold mb-3">
                <img src="{{asset('assets/image/logo.png')}}" alt="ChicRental Logo" width="200" height="200">
                ChicRental
            </h1>
            <p class="lead mb-4">Rent Luxury Dresses, Ornaments & Accessories for Your Dream Day!</p>
            <a href="#categories" class="btn btn-lg btn-danger fw-bold px-4 py-2 shadow">
                <i class="fa-solid fa-bolt"></i> Explore Collection
            </a>
        </div>
        <div class="col-md-6 text-center">
            <img src="{{asset('assets/image/home/Lehenga02.png')}}"
                 class="img-fluid rounded shadow mt-5" style="max-width:350px;" alt="">
        </div>
    </div>
    
    <div class="row text-center mb-5">
        <div class="col-6 col-md-3 mb-4 mb-md-0">
            <i class="fa-solid fa-shield-heart fa-2x text-danger mb-2"></i>
            <h6 class="fw-bold">Premium Quality</h6>
            <small>Only verified branded products</small>
        </div>
        <div class="col-6 col-md-3 mb-4 mb-md-0">
            <i class="fa-solid fa-people-arrows fa-2x text-success mb-2"></i>
            <h6 class="fw-bold">Unisex Collection</h6>
            <small>For both men & women</small>
        </div>
        <div class="col-6 col-md-3">
            <i class="fa-solid fa-bolt fa-2x text-warning mb-2"></i>
            <h6 class="fw-bold">Instant Booking</h6>
            <small>Rent in just a few clicks</small>
        </div>
        <div class="col-6 col-md-3">
            <i class="fa-solid fa-hand-holding-dollar fa-2x text-primary mb-2"></i>
            <h6 class="fw-bold">Affordable Rent</h6>
            <small>Luxury within your budget</small>
        </div>
    </div>

    <!-- Featured Categories -->
    <section id="categories" class="mb-5">
        <h2 class="mb-4 text-center"><i class="fa-solid fa-layer-group text-danger"></i> Shop By Category</h2>
        <div class="row justify-content-center">
            <div class="col-md-4 mb-3">
                <div class="card border-0 shadow-sm h-100">
                    <img src="{{asset('assets/image/home/CD01.png')}}" class="card-img-top" height="600" class="mt-4" alt="Dresses">
                    <div class="card-body text-center">
                        <h5 class="fw-bold mb-2">Dresses</h5>
                        <a href="#" class="btn btn-outline-danger btn-sm">See All</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card border-0 shadow-sm h-100">
                    <img src="{{asset('assets/image/home/Or01.png')}}" class="card-img-top" height="600" class="mt-4" alt="Ornaments">
                    <div class="card-body text-center">
                        <h5 class="fw-bold mb-2">Ornaments</h5>
                        <a href="#" class="btn btn-outline-danger btn-sm">See All</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card border-0 shadow-sm h-100">
                    <img src="{{asset('assets/image/home/Sherwani01.png')}}" class="card-img-top" height="600" class="mt-4" alt="Accessories">
                    <div class="card-body text-center">
                        <h5 class="fw-bold mb-2">Accessories</h5>
                        <a href="#" class="btn btn-outline-danger btn-sm">See All</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Products -->
    <section class="mb-5">
        <h2 class="mb-4 text-center"><i class="fa-solid fa-fire text-danger"></i> Featured For You</h2>
        <div class="row justify-content-center">
            @for ($i = 1; $i <= 4; $i++)
            <div class="col-md-3 mb-4">
                <div class="card h-100 border-0 shadow">
                    <img src="{{asset('assets/image/home/RS06.png')}}" height="150" class="card-img-top" alt="Product {{ $i }}">
                    <div class="card-body text-center">
                        <h5 class="card-title">Designer Dress {{ $i }}</h5>
                        <p class="card-text text-danger fw-bold mb-1">৳{{ 1000 + $i*200 }}/Day</p>
                        <a href="#" class="btn btn-warning text-white fw-bold">
                            <i class="fa-solid fa-cart-plus"></i> Rent Now
                        </a>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </section>

    <div class="p-4 bg-light rounded shadow-sm text-center">
        <h4 class="fw-bold mb-2">Ready to look your dresses world</h4>
        <p>Sign up now & get exclusive discounts on your first rental!</p>
        <a href="{{ route('register') }}" class="btn btn-danger px-4 fw-bold"><i class="fa-solid fa-user-plus"></i> Register</a>
    </div>
</div>
@endsection
