@extends('layouts.app')

@section('content')
    <div class="p-5 mb-4 bg-light rounded-3 text-center">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Find Your Perfect Look</h1>
            <p class="fs-4">Rent premium attire and ornaments for any occasion.</p>
        </div>
    </div>

    {{-- Product section will go here --}}
    <h2>Our Collection</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
    @forelse ($products as $product)
        <div class="col">
            <div class="card h-100">
                {{-- <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}"> --}}
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ Str::limit($product->description, 50) }}</p>
                    <p class="card-text"><strong>Price:</strong> ৳{{ $product->rental_price_per_day }}/day</p>
                </div>
                <div class="card-footer">
                     <a href="#" class="btn btn-primary w-100">View Details</a>
                </div>
            </div>
        </div>
    @empty
        <div class="col">
            <p>No products available at the moment.</p>
        </div>
    @endforelse
</div>
    <div class="row">
        {{-- We will display products here using a loop --}}
    </div>
@endsection