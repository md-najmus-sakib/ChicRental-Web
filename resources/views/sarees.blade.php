@extends('layouts.app')

@section('content')
<div class="container py-4 mt-5">
    <div class="row mb-4">
        <div class="col-lg-8">
            <h2 class="fw-bold mb-2">
                <i class="fa-solid fa-shirt text-danger"></i> Saree Collection
            </h2>
            <div class="text-muted mb-2">Explore our exclusive saree rental collection for every occasion.</div>
        </div>
        <div class="col-lg-4 d-flex align-items-end justify-content-lg-end mb-2 mb-lg-0">
            <!-- Search & Filter -->
            <form class="d-flex w-100" method="GET" action="#">
                <input type="search" name="q" class="form-control me-2" placeholder="Search saree...">
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

    <!-- Saree List -->
    <div class="row g-3">
        @php
            $sareeNames = [
                'Red Bridal Saree', 'Golden Party Saree', 'Traditional Silk Saree',
                'Katan Saree', 'Georgette Saree', 'Tussar Saree',
                'Jamdani Saree', 'Kanjivaram Saree', 'Cotton Saree', 'Banarasi Saree'
            ];
            $prices = [1800, 1600, 2200, 1500, 1750, 1700, 2500, 2000, 1200, 2400];
            $categories = ['Bridal', 'Party', 'Silk', 'Katan', 'Georgette', 'Tussar', 'Jamdani', 'Kanjivaram', 'Cotton', 'Banarasi'];
        @endphp
        @for ($i = 0; $i < 10; $i++)
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100 border-0 shadow-sm product-card position-relative">
                <div class="product-img-container position-relative overflow-hidden">
                    <img src="{{ asset('assets/image/saree-1.jpg') }}" class="card-img-top product-img" alt="{{ $sareeNames[$i] }}">
                    <!-- Quick View Button (triggers modal) -->
                    <button 
                        class="btn btn-light btn-sm quick-view-btn position-absolute top-50 start-50 translate-middle shadow"
                        data-bs-toggle="modal" data-bs-target="#quickViewModal{{ $i }}"
                        type="button">
                        <i class="fa fa-eye"></i> Quick View
                    </button>
                    <button class="btn btn-outline-danger btn-sm rounded-circle shadow-sm position-absolute top-0 end-0 m-2" type="button" title="Add to wishlist">
                        <i class="fa-regular fa-heart"></i>
                    </button>
                </div>
                <div class="card-body text-center py-3">
                    <h6 class="card-title mb-1" style="font-size:1rem;">{{ $sareeNames[$i] }}</h6>
                    <div class="mb-1 text-muted" style="font-size:0.9em;">{{ $categories[$i] }}</div>
                    <div class="fw-bold text-danger mb-2" style="font-size:1.1em;">৳{{ $prices[$i] }}</div>
                    <div class="d-flex gap-2 justify-content-center">
                        <button class="btn btn-outline-danger flex-fill" title="Add to Cart">
                            <i class="fa fa-cart-plus"></i>
                        </button>
                        <button class="btn btn-danger flex-fill fw-bold" title="Rent Now">
                            <i class="fa fa-bag-shopping"></i> Rent Now
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick View Modal for this card -->
        <div class="modal fade" id="quickViewModal{{ $i }}" tabindex="-1" aria-labelledby="quickViewModalLabel{{ $i }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header border-0 pb-0">
                        <h5 class="modal-title" id="quickViewModalLabel{{ $i }}">{{ $sareeNames[$i] }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img src="{{ asset('assets/image/saree/saree-1.jpg') }}" class="img-fluid mb-3 rounded" style="max-height:320px;" alt="{{ $sareeNames[$i] }}">
                        <div class="mb-2 text-muted">{{ $categories[$i] }}</div>
                        <div class="fw-bold text-danger mb-3" style="font-size:1.2em;">৳{{ $prices[$i] }}</div>
                        <p>Lorem ipsum dolor sit amet, beautiful designer saree available for rent.</p>
                        <div class="d-flex gap-2 justify-content-center">
                            <button class="btn btn-outline-danger flex-fill" title="Add to Cart">
                                <i class="fa fa-cart-plus"></i>
                            </button>
                            <button class="btn btn-danger flex-fill fw-bold" title="Rent Now">
                                <i class="fa fa-bag-shopping"></i> Rent Now
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endfor
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
    height: 200px;
    background: #f8f9fa;
    border-radius: 14px 14px 0 0;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
}
.product-img {
    max-height: 96%;
    max-width: 96%;
    object-fit: contain;
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