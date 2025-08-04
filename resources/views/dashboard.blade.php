@extends('layouts.app')

@section('content')
<div class="container py-5 mt-5">
    {{-- Welcome and Profile Picture --}}
    <div class="mb-4 text-center d-flex flex-column align-items-center justify-content-center">
        {{-- Profile Pic --}}
        <div>
            @if(Auth::user()->profile_pic)
                <img src="{{ asset('storage/' . Auth::user()->profile_pic) }}" 
                     alt="Profile Picture" width="70" height="70"
                     style="object-fit:cover; border-radius:50%; border:2px solid #e74c3c; box-shadow:0 2px 8px #e74c3c40; margin-bottom:12px;">
            @else
                <span style="font-size:4rem; color:#e74c3c; margin-bottom:8px;">
                    <i class="fa fa-user-circle"></i>
                </span>
            @endif
        </div>
        <h1 class="fw-bold mb-2 d-inline-block">
            <i class="fa-solid fa-gauge-high"></i>
            Welcome Back,
            <span class="text-danger">{{ Auth::user()->name }}</span>
            <span style="font-size:2rem;">😊</span>
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

    {{-- User quick info section --}}
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        {{-- Profile Pic in Card --}}
                        @if(Auth::user()->profile_pic)
                            <img src="{{ asset('storage/' . Auth::user()->profile_pic) }}" alt="Profile Picture"
                                style="width:42px; height:42px; object-fit:cover; border-radius:50%; border:2px solid #00b8ff; margin-right:12px;">
                        @else
                            <span style="font-size:2.2rem; color:#00b8ff; margin-right:10px;">
                                <i class="fa fa-user-circle"></i>
                            </span>
                        @endif
                        <h5 class="mb-0"><i class="fa-solid fa-circle-info text-info"></i> Your Account Info</h5>
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-3">
                            <span class="text-muted small">Name:</span>
                            <div class="fw-semibold">{{ Auth::user()->name }}</div>
                        </div>
                        <div class="col-6 col-md-3">
                            <span class="text-muted small">Email:</span>
                            <div class="fw-semibold">{{ Auth::user()->email }}</div>
                        </div>
                        <div class="col-6 col-md-3 mt-2 mt-md-0">
                            <span class="text-muted small">Member Since:</span>
                            <div class="fw-semibold">{{ Auth::user()->created_at->format('d M Y') }}</div>
                        </div>
                        <div class="col-6 col-md-3 mt-2 mt-md-0">
                            <span class="text-muted small">Rating:</span>
                            <div class="fw-semibold">
                                @if(Auth::user()->rating)
                                    <span class="text-warning">
                                        @for($i = 1; $i <= 5; $i++)
                                            <i class="fa{{ $i <= Auth::user()->rating ? 's' : 'r' }} fa-star"></i>
                                        @endfor
                                        ({{ Auth::user()->rating }})
                                    </span>
                                @else
                                    <span class="text-muted">Not rated</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Order History Section --}}
    <div class="row justify-content-center mt-5">
        <div class="col-md-10">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <h5 class="mb-3">
                        <i class="fa-solid fa-clock-rotate-left text-secondary"></i>
                        Order History
                    </h5>
                    @if(isset($orders) && $orders->count())
                        <div class="table-responsive">
                            <table class="table table-striped align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Order ID</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Total</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $index => $order)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>#{{ $order->id }}</td>
                                            <td>{{ $order->created_at->format('d M Y') }}</td>
                                            <td>
                                                @if($order->status == 'completed')
                                                    <span class="badge bg-success">Completed</span>
                                                @elseif($order->status == 'pending')
                                                    <span class="badge bg-warning text-dark">Pending</span>
                                                @else
                                                    <span class="badge bg-secondary">{{ ucfirst($order->status) }}</span>
                                                @endif
                                            </td>
                                            <td>৳ {{ number_format($order->total, 2) }}</td>
                                            <td>
                                                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-outline-info btn-sm">
                                                    <i class="fa fa-eye"></i> View
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-info mb-0">
                            <i class="fa fa-info-circle"></i> You haven't placed any orders yet!
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection