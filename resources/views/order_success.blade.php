@extends('layouts.app')

@section('content')
<div class="container py-4 mt-5">
    <h2 class="fw-bold mb-2">Order Success</h2>
    <p>Your order has been placed successfully. Thank you for shopping with us!</p>
    <a href="{{ route('home') }}" class="btn btn-primary">Back to Home</a>
</div>
@endsection