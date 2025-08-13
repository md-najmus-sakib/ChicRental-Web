@extends('layouts.app')

@section('content')
<div class="container py-4 mt-5">

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row mb-4">
        <div class="col-lg-8">
            <h2 class="fw-bold mb-2">
                <i class="fa-solid fa-crown text-danger"></i> Lehenga Collection
            </h2>
            <div class="text-muted mb-2">Explore our exclusive lehenga rental collection for your special events.</div>
        </div>
        <div class="col-lg-4 d-flex align-items-end justify-content-lg-end mb-2 mb-lg-0">
            <form class="d-flex w-100" method="GET" action="#">
                <input type="search" name="q" class="form-control me-2" placeholder="Search lehenga...">
                <select class="form-select me-2" name="sort">
                    <option value="">Sort by</option>
                    <option value="low-high">Price: Low to High</option>
                    <option value="high-low">Price: High to Low</option>
                    <option value="new">Newest</option>
                </select>
                <button class="btn btn-danger" type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>

    <div class="row g-4">
        @php
        $lehengas = [
            ["name"=>"Crimson Bridal Lehenga","category"=>"Bridal","image"=>"lehenga1.jpg","price"=>4200],
            ["name"=>"Golden Party Lehenga","category"=>"Party","image"=>"lehenga2.jpg","price"=>3800],
            ["name"=>"Royal Blue Designer","category"=>"Designer","image"=>"lehenga3.jpg","price"=>4000],
            ["name"=>"Emerald Wedding Set","category"=>"Wedding","image"=>"lehenga4.jpg","price"=>4600],
            ["name"=>"Classic Red Lehenga","category"=>"Bridal","image"=>"lehenga5.jpg","price"=>4400],
            ["name"=>"Blush Pink Lehenga","category"=>"Party","image"=>"lehenga6.jpg","price"=>3500],
            ["name"=>"Mehendi Green Set","category"=>"Traditional","image"=>"lehenga7.jpg","price"=>3700],
            ["name"=>"Navy Velvet Lehenga","category"=>"Designer","image"=>"lehenga8.jpg","price"=>3900],
            ["name"=>"Silver Grey Lehenga","category"=>"Evening","image"=>"lehenga9.jpg","price"=>3600],
            ["name"=>"Floral Embroidery Set","category"=>"Festive","image"=>"lehenga10.jpg","price"=>3300],
        ];
        @endphp

        @foreach($lehengas as $lehenga)
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card h-100 border-0 shadow-sm product-card position-relative">
                <div class="product-img-container position-relative overflow-hidden">
                    <img src="{{ asset('assets/image/'.$lehenga['image']) }}" class="card-img-top product-img" alt="{{ $lehenga['name'] }}">
                    <button class="btn btn-light btn-sm quick-view-btn position-absolute top-50 start-50 translate-middle shadow" type="button" data-bs-toggle="modal" data-bs-target="#quickViewModal{{ $loop->index }}">
                        <i class="fa fa-eye"></i> Quick View
                    </button>
                    <button class="btn btn-outline-danger btn-sm rounded-circle shadow-sm position-absolute top-0 end-0 m-2" type="button" title="Add to wishlist">
                        <i class="fa-regular fa-heart"></i>
                    </button>
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title mb-1">{{ $lehenga['name'] }}</h5>
                    <div class="mb-1 text-muted" style="font-size:0.95em;">{{ $lehenga['category'] }}</div>
                    <div class="fw-bold text-danger fs-5 mb-1">৳{{ number_format($lehenga['price'], 0) }}</div>

                    <div class="d-flex gap-2 justify-content-center">
                        <form method="POST" action="{{ route('cart.add') }}" class="flex-fill">
                            @csrf
                            <input type="hidden" name="name" value="{{ $lehenga['name'] }}">
                            <input type="hidden" name="category" value="{{ $lehenga['category'] }}">
                            <input type="hidden" name="price" value="{{ $lehenga['price'] }}">
                            <input type="hidden" name="image_url" value="{{ asset('assets/image/'.$lehenga['image']) }}">
                            <input type="hidden" name="quantity" value="1">
                            <button class="btn btn-outline-danger w-100" type="submit" title="Add to Cart">
                                <i class="fa fa-cart-plus"></i>
                            </button>
                        </form>

                        <form method="POST" action="{{ route('cart.add') }}" class="flex-fill">
                            @csrf
                            <input type="hidden" name="name" value="{{ $lehenga['name'] }}">
                            <input type="hidden" name="category" value="{{ $lehenga['category'] }}">
                            <input type="hidden" name="price" value="{{ $lehenga['price'] }}">
                            <input type="hidden" name="image_url" value="{{ asset('assets/image/'.$lehenga['image']) }}">
                            <input type="hidden" name="quantity" value="1">
                            <button class="btn btn-danger w-100 fw-bold" type="submit" title="Rent Now">
                                <i class="fa fa-bag-shopping"></i> Rent Now
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Quick View Modal --}}
        <div class="modal fade" id="quickViewModal{{ $loop->index }}" tabindex="-1" aria-labelledby="quickViewModalLabel{{ $loop->index }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header border-0 pb-0">
                        <h5 class="modal-title" id="quickViewModalLabel{{ $loop->index }}">{{ $lehenga['name'] }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body row">
                        <div class="col-md-5">
                            <img src="{{ asset('assets/image/'.$lehenga['image']) }}" class="img-fluid rounded" alt="">
                        </div>
                        <div class="col-md-7">
                            <div class="mb-2">
                                <span class="badge bg-danger me-2">{{ $lehenga['category'] }}</span>
                            </div>
                            <div class="mb-2">Premium designer lehenga available for rent. Perfect for events, parties, and weddings.</div>
                            <div class="fw-bold text-danger fs-4 mb-2">
                                ৳{{ number_format($lehenga['price'], 0) }}
                            </div>
                            <div class="mb-3">
                                <span class="fw-bold">Size:</span> Free Size
                            </div>

                            {{-- Modal Add to Cart --}}
                            <form method="POST" action="{{ route('cart.add') }}" class="d-inline">
                                @csrf
                                <input type="hidden" name="name" value="{{ $lehenga['name'] }}">
                                <input type="hidden" name="category" value="{{ $lehenga['category'] }}">
                                <input type="hidden" name="price" value="{{ $lehenga['price'] }}">
                                <input type="hidden" name="image_url" value="{{ asset('assets/image/'.$lehenga['image']) }}">
                                <input type="hidden" name="quantity" value="1">
                                <button class="btn btn-outline-danger">
                                    <i class="fa fa-cart-plus"></i> Add to Cart
                                </button>
                            </form>

                            <form method="POST" action="{{ route('cart.add') }}" class="d-inline ms-2">
                                @csrf
                                <input type="hidden" name="name" value="{{ $lehenga['name'] }}">
                                <input type="hidden" name="category" value="{{ $lehenga['category'] }}">
                                <input type="hidden" name="price" value="{{ $lehenga['price'] }}">
                                <input type="hidden" name="image_url" value="{{ asset('assets/image/'.$lehenga['image']) }}">
                                <input type="hidden" name="quantity" value="1">
                                <button class="btn btn-danger fw-bold">
                                    <i class="fa fa-bag-shopping"></i> Rent Now
                                </button>
                            </form>

                            <button class="btn btn-outline-secondary ms-2">
                                <i class="fa-regular fa-heart"></i> Wishlist
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@push('styles')
<style>
.product-card {
    transition: box-shadow 0.25s;
    border-radius: 14px;
}
.product-card:hover {
    box-shadow: 0 0.5rem 1.5rem rgba(220,53,69,0.14);
}
.product-img-container {
    width: 100%;
    height: 310px;
    background: #f8f9fa;
    border-radius: 14px 14px 0 0;
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
}
.product-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.3s;
}
.product-img-container:hover .product-img {
    transform: scale(1.07) rotate(-1.5deg);
}
.quick-view-btn {
    opacity: 0;
    transition: opacity 0.3s;
    pointer-events: none;
}
.product-img-container:hover .quick-view-btn {
    opacity: 1;
    pointer-events: auto;
}
.card-title {
    font-size: 1.08rem;
}
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let alertBox = document.querySelector('.alert');
        if (alertBox) {
            setTimeout(function () {
                alertBox.classList.add('fade');
                setTimeout(() => alertBox.remove(), 500);
            }, 1500);
        }
    });
</script>
@endpush