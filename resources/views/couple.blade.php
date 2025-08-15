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

    {{-- Header + Search/Sort --}}
    <div class="row mb-4">
        <div class="col-lg-8">
            <h2 class="fw-bold mb-2">
                <i class="fa-solid fa-heart text-danger"></i> Couple Dress Collection
            </h2>
            <div class="text-muted mb-2">Explore our exclusive couple dress rental collection for weddings and special occasions.</div>
        </div>
        <div class="col-lg-4 d-flex align-items-end justify-content-lg-end mb-2 mb-lg-0">
            <form class="d-flex w-100" method="GET" action="#">
                <input type="search" name="q" class="form-control me-2" placeholder="Search couple set...">
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

    {{-- Product Grid --}}
    <div class="row g-3">
        @php
            $coupleNames = [
                'Royal Maroon Velvet Set', 'Ivory & Gold Heritage Set', 'Midnight Blue Luxe Set', 'Emerald Trad-Chic Set'
            ];
            $prices = [4200, 4800, 3990, 4450];
            $categories = ['Reception', 'Wedding', 'Party', 'Designer'];
            $images = [
                ['couple-1-men.jpg', 'couple-1-women.jpg'], 
                ['couple-2-men.jpg', 'couple-2-women.jpg'], 
                ['couple-3-men.jpg', 'couple-3-women.jpg'], 
                ['couple-4-men.jpg', 'couple-4-women.jpg']
            ];
        @endphp

        @foreach($coupleNames as $index => $name)
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100 border-0 shadow-sm product-card position-relative">
                <div class="product-img-container position-relative overflow-hidden">
                    <img src="{{ asset('assets/image/couple/'.$images[$index][0]) }}" class="card-img-top product-img" alt="{{ $name }} (Men)">
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
                    <div class="fw-bold text-danger mb-2" style="font-size:1.1em;">৳{{ $prices[$index] }}</div>
                    <div class="d-flex gap-2 justify-content-center">
                        <form method="POST" action="{{ route('cart.add') }}" class="flex-fill">
                            @csrf
                            <input type="hidden" name="name" value="{{ $name }}">
                            <input type="hidden" name="price" value="{{ $prices[$index] }}">
                            <input type="hidden" name="image_url" value="{{ asset('assets/image/couple/'.$images[$index][1]) }}">
                            <input type="hidden" name="category" value="Couple Dress">
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="btn btn-outline-danger w-100" title="Add to Cart">
                                <i class="fa fa-cart-plus"></i> Add to Cart
                            </button>
                        </form>
                        <button class="btn btn-danger flex-fill fw-bold" title="Rent Now">
                            <i class="fa fa-bag-shopping"></i> Rent Now
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
                        <img src="{{ asset('assets/image/couple/'.$images[$index][0]) }}" class="img-fluid mb-3 rounded" style="max-height:320px;" alt="{{ $name }} (Men)">
                        <div class="mb-2 text-muted">{{ $categories[$index] }}</div>
                        <div class="fw-bold text-danger mb-3" style="font-size:1.2em;">৳{{ $prices[$index] }}</div>
                        <p>Lorem ipsum dolor sit amet, beautiful designer couple set available for rent.</p>
                        <div class="d-flex gap-2 justify-content-center">
                            <form method="POST" action="{{ route('cart.add') }}" class="flex-fill">
                                @csrf
                                <input type="hidden" name="name" value="{{ $name }}">
                                <input type="hidden" name="price" value="{{ $prices[$index] }}">
                                <input type="hidden" name="image_url" value="{{ asset('assets/image/couple/'.$images[$index][1]) }}">
                                <input type="hidden" name="category" value="Couple Dress">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="btn btn-outline-danger w-100" title="Add to Cart">
                                    <i class="fa fa-cart-plus"></i> Add to Cart
                                </button>
                            </form>
                            <button class="btn btn-danger flex-fill fw-bold" title="Rent Now">
                                <i class="fa fa-bag-shopping"></i> Rent Now
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
    box-shadow: 0 0.5rem 1.5rem rgba(220,53,69,0.15);
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