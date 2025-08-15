@extends('layouts.app')

@section('content')
<div class="container py-4 mt-5">
    <h2 class="fw-bold mb-2">Checkout</h2>
    <div class="row">
        <div class="col-md-8">
            <h4>Shipping Address</h4>
            <form action="{{ route('checkout.placeOrder') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" required>
                </div>

                <h4>Payment Method</h4>
                <div class="mb-3">
                    <select class="form-select" name="payment_method" required>
                        <option value="">Choose Payment Method</option>
                        <option value="credit_card">Credit Card</option>
                        <option value="cash_on_delivery">Cash on Delivery</option>
                    </select>
                </div>

                <h4>Order Summary</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cartItems as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>৳{{ $item->price }}</td>
                                <td>
                                    <input type="number" name="cart_items[{{ $item->id }}][quantity]" value="{{ $item->quantity }}" min="1" class="form-control" required>
                                    <input type="hidden" name="cart_items[{{ $item->id }}][id]" value="{{ $item->id }}">
                                    <input type="hidden" name="cart_items[{{ $item->id }}][price]" value="{{ $item->price }}">
                                </td>
                                <td>৳{{ $item->price * $item->quantity }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-between">
                    <h5>Total: ৳{{ $totalAmount }}</h5>
                    <button type="submit" class="btn btn-danger">Place Order</button>
                </div>
            </form>
        </div>
        <div class="col-md-4">
            <div class="card p-3">
                <h5>Order Summary</h5>
                <p><strong>Subtotal: </strong> ৳{{ $totalAmount }}</p>
                <p><strong>Delivery Charge: </strong> ৳60.00</p>
                <h5><strong>Total: </strong> ৳{{ $totalAmount + 60 }}</h5>
            </div>
        </div>
    </div>
</div>
@endsection