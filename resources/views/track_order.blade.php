@extends('layouts.app')

@section('content')
<div class="container py-5 mt-5">
    <h2 class="fw-bold mb-4 text-center">
        <i class="fa-solid fa-truck-fast text-danger"></i> Track Your Order
    </h2>

    <!-- Order Track Form -->
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body">
                    <form action="{{ route('track_order') }}" method="GET">
                        <label for="order_id" class="form-label fw-bold mb-2">Enter your Order ID</label>
                        <div class="input-group mb-3">
                            <input type="text" name="order_id" id="order_id" class="form-control" placeholder="Order ID" required>
                            <button class="btn btn-danger fw-bold" type="submit">
                                <i class="fa-solid fa-magnifying-glass"></i> Track
                            </button>
                        </div>
                        @if(session('error'))
                            <div class="alert alert-danger mt-2 py-2">{{ session('error') }}</div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- If order is found, show status -->
    @if(isset($order))
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="mb-3">Order ID: <span class="fw-bold">{{ $order->id }}</span></h5>
                    <p class="mb-1">Placed On: {{ $order->created_at->format('d M Y, h:i A') }}</p>
                    <p class="mb-3">Total: ৳{{ number_format($order->total, 2) }}</p>
                    <!-- Progress Steps -->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        @php
                            $steps = ['Placed', 'Confirmed', 'Shipped', 'Delivered'];
                            $status = $order->status; // example: 'Confirmed'
                            $currentStep = array_search($status, $steps);
                        @endphp
                        @foreach($steps as $i => $step)
                            <div class="text-center flex-fill">
                                <div class="rounded-circle mx-auto mb-2 {{ $i <= $currentStep ? 'bg-danger text-white' : 'bg-light text-muted' }}" style="width:38px;height:38px;display:flex;align-items:center;justify-content:center;font-weight:bold;font-size:1.2rem;">
                                    {{ $i+1 }}
                                </div>
                                <span style="font-size:0.98rem;font-weight:500" class="{{ $i <= $currentStep ? 'text-danger' : 'text-secondary' }}">
                                    {{ $step }}
                                </span>
                            </div>
                            @if($i < count($steps)-1)
                                <div class="flex-fill" style="height:4px; background:{{ $i < $currentStep ? '#dc3545' : '#ddd' }};"></div>
                            @endif
                        @endforeach
                    </div>
                    <!-- Order summary (optional) -->
                    <div>
                        <span class="fw-bold">Current Status:</span>
                        <span class="badge bg-{{ $order->status == 'Delivered' ? 'success' : ($order->status == 'Shipped' ? 'primary' : 'danger') }}">
                            {{ $order->status }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection