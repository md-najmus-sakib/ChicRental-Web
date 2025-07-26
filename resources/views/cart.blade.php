@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold mb-4"><i class="fa-solid fa-cart-shopping text-danger"></i> Shopping Cart</h2>
    @if(isset($cartItems) && count($cartItems))
        <div class="row">
            <div class="col-lg-8">
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Product</th>
                                <th>Item</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Qty</th>
                                <th class="text-center">Subtotal</th>
                                <th class="text-center">Wishlist</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cartItems as $item)
                            <tr>
                                <td style="width:90px">
                                    <img src="{{ $item->image_url ?? asset('assets/img/noimage.png') }}" alt="{{ $item->name }}" class="img-fluid rounded" style="max-width:60px;">
                                </td>
                                <td>
                                    <span class="fw-bold">{{ $item->name }}</span><br>
                                    <span class="text-muted small">{{ $item->category ?? '' }}</span>
                                </td>
                                <td class="text-center">৳{{ number_format($item->price, 2) }}</td>
                                <td class="text-center">
                                    <form method="POST" action="{{ route('cart.update', $item->id) }}" class="d-inline">
                                        @csrf
                                        <input type="number" name="quantity" min="1" value="{{ $item->quantity }}" class="form-control form-control-sm d-inline-block" style="width:65px;">
                                        <button class="btn btn-link text-success p-0 ms-2" type="submit" title="Update"><i class="fa-solid fa-arrows-rotate"></i></button>
                                    </form>
                                </td>
                                <td class="text-center">৳{{ number_format($item->price * $item->quantity, 2) }}</td>
                                <td class="text-center">
                                    <!-- Move to Wishlist button -->
                                    <form method="POST" action="{{ route('wishlist.add', $item->id) }}">
                                        @csrf
                                        <button class="btn btn-link text-warning" type="submit" title="Move to Wishlist">
                                            <i class="fa-solid fa-heart"></i>
                                        </button>
                                    </form>
                                </td>
                                <td class="text-center">
                                    <form method="POST" action="{{ route('cart.remove', $item->id) }}">
                                        @csrf
                                        <button class="btn btn-link text-danger" type="submit" title="Remove"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Coupon Apply Section -->
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
                <div class="card shadow border-0">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">Order Summary</h5>
                        @php
                            $total = 0;
                            foreach($cartItems as $item) {
                                $total += $item->price * $item->quantity;
                            }
                            // Demo coupon logic (replace with real)
                            $discount = session('coupon_discount') ?? 0; // in percentage, e.g. 10 = 10%
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
