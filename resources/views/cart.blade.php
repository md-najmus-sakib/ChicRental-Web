@extends('layouts.app')

@section('content')
<div class="container py-5 mt-5">

    {{-- Success Message Pop-up --}}
    @if(session('success'))
        <div id="cart-alert" class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    <h2 class="fw-bold mb-4">
        <i class="fa-solid fa-cart-shopping text-danger"></i> My Cart
        <span class="badge bg-danger ms-1">{{ $cart->count() }}</span>
    </h2>

    @if($cart->count())
        <div class="row g-4">
            <div class="col-lg-8">
                @foreach($cart as $item)
                <div class="card shadow-sm border-0 mb-3 position-relative cart-item-card">
                    <div class="row g-0 align-items-center">
                        <div class="col-3 col-md-2 text-center">
                            <img src="{{ $item->image_url ?? asset('assets/img/noimage.png') }}"
                                 alt="{{ $item->name }}"
                                 class="img-fluid rounded"
                                 style="max-width:70px; max-height:70px; object-fit:cover; box-shadow:0 1px 8px #ececec;">
                        </div>
                        <div class="col-9 col-md-7">
                            <div class="ps-md-2">
                                <div class="fw-semibold fs-6 mb-1">{{ $item->name }}</div>
                                <div class="text-muted small">{{ $item->category ?? '' }}</div>
                                <div class="text-primary fw-bold">৳{{ number_format($item->price,2) }}</div>
                                <div class="d-flex align-items-center mt-1">
                                    <form method="POST" action="{{ route('cart.update', $item->id) }}" class="d-flex align-items-center me-2">
                                        @csrf
                                        <input type="number" name="quantity" min="1" value="{{ $item->quantity }}"
                                               class="form-control form-control-sm" style="width:55px;">
                                        <button class="btn btn-link text-success p-0 ms-2" type="submit" title="Update">
                                            <i class="fa-solid fa-arrows-rotate"></i>
                                        </button>
                                    </form>
                                    <div class="ms-2">
                                        <span class="small text-muted">Subtotal: </span>
                                        <span class="fw-semibold">৳{{ number_format($item->price * $item->quantity,2) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 text-md-end text-start mt-3 mt-md-0 d-flex flex-md-column flex-row gap-2 justify-content-end align-items-center pe-3">
                            {{-- Remove Button --}}
                            <form method="POST" action="{{ route('cart.remove', $item->id) }}">
                                @csrf
                                <button class="btn btn-outline-danger btn-sm px-3" type="submit" title="Remove">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="card shadow-sm border-0 mt-4">
                    <div class="card-body py-3">
                        <form method="POST" action="{{ route('cart.coupon') }}" class="row g-2 align-items-center">
                            @csrf
                            <div class="col-8 col-md-10">
                                <input type="text" name="coupon_code" class="form-control" placeholder="Enter coupon code" value="{{ session('applied_coupon') }}">
                            </div>
                            <div class="col-4 col-md-2">
                                <button class="btn btn-danger w-100 fw-bold" type="submit">
                                    <i class="fa-solid fa-tag"></i> Apply
                                </button>
                            </div>
                        </form>
                        @if(session('coupon_message'))
                            <div class="text-success small mt-2">{{ session('coupon_message') }}</div>
                        @elseif(session('coupon_error'))
                            <div class="text-danger small mt-2">{{ session('coupon_error') }}</div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card shadow border-0 sticky-top" style="top:90px">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">Order Summary</h5>
                        @php
                            $total = 0;
                            foreach($cart as $item) {
                                $total += $item->price * $item->quantity;
                            }
                            $discount = session('coupon_discount') ?? 0;
                            $discountAmount = $discount ? ($total * $discount / 100) : 0;
                            $delivery = 60;
                            $grandTotal = $total - $discountAmount + $delivery;
                        @endphp
                        <div class="d-flex justify-content-between mb-2">
                            <span>Subtotal:</span>
                            <span class="fw-bold">৳{{ number_format($total, 2) }}</span>
                        </div>
                        @if($discountAmount)
                        <div class="d-flex justify-content-between mb-2">
                            <span>Discount ({{ $discount }}%):</span>
                            <span class="fw-bold text-success">-৳{{ number_format($discountAmount, 2) }}</span>
                        </div>
                        @endif
                        <div class="d-flex justify-content-between mb-2">
                            <span>Delivery Charge:</span>
                            <span>৳{{ number_format($delivery, 2) }}</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mb-4">
                            <span class="fw-bold fs-5">Total:</span>
                            <span class="fw-bold fs-5 text-danger">৳{{ number_format($grandTotal, 2) }}</span>
                        </div>
                        <a href="{{ route('checkout') }}" class="btn btn-danger w-100 fw-bold">
                            <i class="fa-solid fa-credit-card"></i> Proceed to Checkout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="text-center py-5">
            <i class="fa-solid fa-cart-shopping fa-3x text-muted mb-3"></i>
            <h4 class="text-muted">Your cart is empty!</h4>
            <a href="{{ route('home') }}" class="btn btn-outline-danger mt-3">
                <i class="fa-solid fa-arrow-left"></i> Shop Now
            </a>
        </div>
    @endif
</div>
@endsection

@push('styles')
<style>
    .cart-item-card:hover {
        border-color: #e74c3c;
        box-shadow: 0 2px 20px #e74c3c1a;
        transition: all 0.22s;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var alertBox = document.getElementById('cart-alert');
        if(alertBox){
            setTimeout(function(){
                var bsAlert = new bootstrap.Alert(alertBox);
                bsAlert.close();
            }, 1500);
        }
    });
</script>
@endpush