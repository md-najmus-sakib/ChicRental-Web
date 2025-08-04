@extends('layouts.app')

@section('content')
<div class="container py-5 mt-5">
    <div class="mb-4 text-center">
        <h1 class="fw-bold mb-2">
            <i class="fa-solid fa-gauge-high"></i>
            Welcome Back, <span class="text-danger">{{ Auth::user()->name }}</span>😊
        </h1>
        <p class="lead text-muted">All your activities are here.</p>
    </div>

    <div class="row justify-content-center g-4">
        <!-- Profile Card -->
        <div class="col-12 col-md-4">
            <div class="card shadow border-0 text-center h-100">
                <div class="card-body">
                    <i class="fa-solid fa-user-gear fa-2x text-primary mb-3"></i>
                    <h5 class="card-title mb-2">My Profile</h5>
                    <p class="mb-2 text-muted">Edit your account details and password.</p>
                    <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary btn-sm">
                        <i class="fa-solid fa-pen-to-square"></i> Edit Profile
                    </a>
                </div>
            </div>
        </div>

        <!-- Orders Card -->
        <div class="col-12 col-md-4">
            <div class="card shadow border-0 text-center h-100">
                <div class="card-body">
                    <i class="fa-solid fa-box-open fa-2x text-success mb-3"></i>
                    <h5 class="card-title mb-2">Orders</h5>
                    <p class="mb-2 text-muted">See and track your current & past orders.</p>
                    <a href="{{ route('track_order') }}" class="btn btn-outline-success btn-sm">
                        <i class="fa-solid fa-truck"></i> Track Orders
                    </a>
                </div>
            </div>
        </div>

        <!-- Wishlist Card -->
        <div class="col-12 col-md-4">
            <div class="card shadow border-0 text-center h-100">
                <div class="card-body">
                    <i class="fa-solid fa-heart fa-2x text-warning mb-3"></i>
                    <h5 class="card-title mb-2">Wishlist</h5>
                    <p class="mb-2 text-muted">All products you have wishlisted.</p>
                    <a href="#" class="btn btn-outline-warning btn-sm">
                        <i class="fa-solid fa-heart"></i> My Wishlist
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Example: User quick info section -->
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="mb-3"><i class="fa-solid fa-circle-info text-info"></i> Your Account Info</h5>
                    <div class="row">
                        <div class="col-6 col-md-4">
                            <span class="text-muted small">Name:</span>
                            <div class="fw-semibold">{{ Auth::user()->name }}</div>
                        </div>
                        <div class="col-6 col-md-4">
                            <span class="text-muted small">Email:</span>
                            <div class="fw-semibold">{{ Auth::user()->email }}</div>
                        </div>
                        <div class="col-12 col-md-4 mt-2 mt-md-0">
                            <span class="text-muted small">Member Since:</span>
                            <div class="fw-semibold">
                                {{ Auth::user()->created_at->format('d M Y') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection