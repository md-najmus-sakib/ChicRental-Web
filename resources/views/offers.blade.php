@extends('layouts.app')

@section('content')
<div class="container py-4 mt-5">

    {{-- Success Alert --}}
    @if(session('success'))
        <div id="page-alert" class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Header + Search --}}
    <div class="row mb-4">
        <div class="col-lg-8">
            <h2 class="fw-bold mb-2">
                <i class="fa-solid fa-tags text-success"></i> Offers
            </h2>
            <div class="text-muted mb-2">Browse our exclusive offers available for a limited time. Don't miss out!</div>
        </div>
        <div class="col-lg-4 d-flex align-items-end justify-content-lg-end mb-2 mb-lg-0">
            <form class="d-flex w-100" method="GET" action="#">
                <input type="search" name="q" class="form-control me-2" placeholder="Search offers...">
                <select class="form-select me-2" name="sort">
                    <option value="">Sort by</option>
                    <option value="low-high">Price: Low to High</option>
                    <option value="high-low">Price: High to Low</option>
                    <option value="new">Newest</option>
                </select>
                <button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>

    {{-- Offers Grid --}}
    <div class="row g-3">
        @php
            $offerNames = [
                'Summer Discount on Couples Set', 'Buy One Get One Free', 'Seasonal Sale on Party Wear',
                'Discount on Wedding Dresses', 'Flash Sale on Men’s Collection', 'Limited Time Offer on Sarees'
            ];
            $prices = [3200, 1500, 3500, 2500, 2000, 2700];
            $categories = ['Couple Sets', 'BOGO', 'Party Wear', 'Wedding Dresses', 'Men’s Wear', 'Sarees'];
            $images = [
                'offer-1.jpg', 'offer-2.jpg', 'offer-3.jpg', 'offer-4.jpg', 'offer-5.jpg', 'offer-6.jpg'
            ];
        @endphp

        @foreach($offerNames as $index => $name)
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100 border-0 shadow-sm product-card position-relative">
                <div class="product-img-container position-relative overflow-hidden">
                    <img src="{{ asset('assets/image/offers/'.$images[$index]) }}" class="card-img-top product-img" alt="{{ $name }}">
                    <button 
                        class="btn btn-light btn-sm quick-view-btn position-absolute top-50 start-50 translate-middle shadow"
                        data-bs-toggle="modal" data-bs-target="#quickViewModal{{ $index }}"
                        type="button">
                        <i class="fa fa-eye"></i> Quick View
                    </button>
                </div>
                <div class="card-body text-center py-3">
                    <h6 class="card-title mb-1" style="font-size:1rem;">{{ $name }}</h6>
                    <div class="mb-1 text-muted" style="font-size:0.9em;">{{ $categories[$index] }}</div>
                    <div class="fw-bold text-success mb-2" style="font-size:1.1em;">৳{{ $prices[$index] }}</div>
                    <div class="d-flex gap-2 justify-content-center">
                        <form method="POST" action="{{ route('cart.add') }}" class="flex-fill">
                            @csrf
                            <input type="hidden" name="name" value="{{ $name }}">
                            <input type="hidden" name="price" value="{{ $prices[$index] }}">
                            <input type="hidden" name="image_url" value="{{ asset('assets/image/offers/'.$images[$index]) }}">
                            <input type="hidden" name="category" value="Offers">
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="btn btn-outline-success w-100" title="Add to Cart">
                                <i class="fa fa-cart-plus"></i> Add to Cart
                            </button>
                        </form>
                        <button class="btn btn-success flex-fill fw-bold" title="Claim Offer">
                            <i class="fa fa-gift"></i> Claim Offer
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Quick View Modal --}}
        <div class="modal fade" id="quickViewModal{{ $index }}" tabindex="-1" aria-labelledby="quickViewModalLabel{{ $index }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header border-0 pb-0">
                        <h5 class="modal-title" id="quickViewModalLabel{{ $index }}">{{ $name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img src="{{ asset('assets/image/offers/'.$images[$index]) }}" class="img-fluid mb-3 rounded" style="max-height:320px;" alt="{{ $name }}">
                        <div class="mb-2 text-muted">{{ $categories[$index] }}</div>
                        <div class="fw-bold text-success mb-3" style="font-size:1.2em;">৳{{ $prices[$index] }}</div>
                        <p>Exclusive offer available for a limited time. Grab it while it lasts!</p>
                        <div class="d-flex gap-2 justify-content-center">
                            <form method="POST" action="{{ route('cart.add') }}" class="flex-fill">
                                @csrf
                                <input type="hidden" name="name" value="{{ $name }}">
                                <input type="hidden" name="price" value="{{ $prices[$index] }}">
                                <input type="hidden" name="image_url" value="{{ asset('assets/image/offers/'.$images[$index]) }}">
                                <input type="hidden" name="category" value="Offers">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="btn btn-outline-success w-100" title="Add to Cart">
                                    <i class="fa fa-cart-plus"></i> Add to Cart
                                </button>
                            </form>
                            <button class="btn btn-success flex-fill fw-bold" title="Claim Offer">
                                <i class="fa fa-gift"></i> Claim Offer
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
    min-height: 350px;
    max-width: 260px;
    margin: 0 auto;
}
.product-card:hover {
    box-shadow: 0 0.5rem 1.5rem rgba(40,167,69,0.15);
}
.product-img-container {
    width: 100%;
    height: 340px;
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
    transform: scale(1.05) rotate(-1.5deg);
}
.quick-view-btn {
    opacity: 0;
    transition: opacity 0.3s;
    pointer-events: none;
    z-index: 2;
}
.product-img-container:hover .quick-view-btn {
    opacity: 1;
    pointer-events: auto;
}
.card-title {
    font-size: 1rem;
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