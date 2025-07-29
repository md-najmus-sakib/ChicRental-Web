@extends('layouts.app')

@section('content')
<div class="container py-4 mt-5">
    <div class="row mb-4">
        <div class="col-lg-8">
            <h2 class="fw-bold mb-2">
                <i class="fa-solid fa-user-tie text-primary"></i> Men’s Suit Collection
            </h2>
            <div class="text-muted mb-2">Discover classy suits for wedding, party, business and more. Rent or add to wishlist in a click!</div>
        </div>
        <div class="col-lg-4 d-flex align-items-end justify-content-lg-end mb-2 mb-lg-0">
            <form class="d-flex w-100" method="GET" action="#">
                <input type="search" name="q" class="form-control me-2" placeholder="Search suits...">
                <select class="form-select me-2" name="sort">
                    <option value="">Sort by</option>
                    <option value="low-high">Price: Low to High</option>
                    <option value="high-low">Price: High to Low</option>
                    <option value="new">Newest</option>
                </select>
                <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>

    <!-- Suit List -->
    <div class="row g-4">

        <!-- Card 1 -->
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card h-100 border-0 shadow product-card-men position-relative">
                <div class="product-img-container-men position-relative overflow-hidden">
                    <img src="{{ asset('assets/image/suit1.jpg') }}" class="card-img-top product-img-men" alt="Classic Navy Suit">
                    <button class="btn btn-dark btn-sm quick-view-btn-men position-absolute top-50 start-50 translate-middle shadow">
                        <i class="fa fa-eye"></i> Quick View
                    </button>
                    <button class="btn btn-outline-primary btn-sm rounded-circle shadow-sm position-absolute top-0 end-0 m-2" type="button" title="Add to wishlist">
                        <i class="fa-regular fa-heart"></i>
                    </button>
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title mb-1 fw-semibold">Classic Navy Suit</h5>
                    <div class="mb-1 text-muted" style="font-size:0.98em;">Wedding/Party</div>
                    <div class="fw-bold text-primary fs-5 mb-1">৳2,400</div>
                    <div class="d-flex gap-2 justify-content-center">
                        <button class="btn btn-outline-primary flex-fill" title="Add to Cart">
                            <i class="fa fa-cart-plus"></i>
                        </button>
                        <button class="btn btn-primary flex-fill fw-bold" title="Rent Now">
                            <i class="fa fa-bag-shopping"></i> Rent Now
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card h-100 border-0 shadow product-card-men position-relative">
                <div class="product-img-container-men position-relative overflow-hidden">
                    <img src="{{ asset('assets/image/suit2.jpg') }}" class="card-img-top product-img-men" alt="Business Gray Suit">
                    <button class="btn btn-dark btn-sm quick-view-btn-men position-absolute top-50 start-50 translate-middle shadow">
                        <i class="fa fa-eye"></i> Quick View
                    </button>
                    <button class="btn btn-outline-primary btn-sm rounded-circle shadow-sm position-absolute top-0 end-0 m-2" type="button" title="Add to wishlist">
                        <i class="fa-regular fa-heart"></i>
                    </button>
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title mb-1 fw-semibold">Business Gray Suit</h5>
                    <div class="mb-1 text-muted" style="font-size:0.98em;">Business</div>
                    <div class="fw-bold text-primary fs-5 mb-1">৳2,200</div>
                    <div class="d-flex gap-2 justify-content-center">
                        <button class="btn btn-outline-primary flex-fill" title="Add to Cart">
                            <i class="fa fa-cart-plus"></i>
                        </button>
                        <button class="btn btn-primary flex-fill fw-bold" title="Rent Now">
                            <i class="fa fa-bag-shopping"></i> Rent Now
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card h-100 border-0 shadow product-card-men position-relative">
                <div class="product-img-container-men position-relative overflow-hidden">
                    <img src="{{ asset('assets/image/suit3.jpg') }}" class="card-img-top product-img-men" alt="Slim Fit Black Tuxedo">
                    <button class="btn btn-dark btn-sm quick-view-btn-men position-absolute top-50 start-50 translate-middle shadow">
                        <i class="fa fa-eye"></i> Quick View
                    </button>
                    <button class="btn btn-outline-primary btn-sm rounded-circle shadow-sm position-absolute top-0 end-0 m-2" type="button" title="Add to wishlist">
                        <i class="fa-regular fa-heart"></i>
                    </button>
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title mb-1 fw-semibold">Slim Fit Black Tuxedo</h5>
                    <div class="mb-1 text-muted" style="font-size:0.98em;">Formal</div>
                    <div class="fw-bold text-primary fs-5 mb-1">৳2,800</div>
                    <div class="d-flex gap-2 justify-content-center">
                        <button class="btn btn-outline-primary flex-fill" title="Add to Cart">
                            <i class="fa fa-cart-plus"></i>
                        </button>
                        <button class="btn btn-primary flex-fill fw-bold" title="Rent Now">
                            <i class="fa fa-bag-shopping"></i> Rent Now
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- আরও কার্ড চাইলে এইভাবে কপি-পেস্ট করে নাম/ছবি/দাম পাল্টাও -->

    </div>
</div>
@endsection

@push('styles')
<style>
.product-card-men {
    transition: box-shadow 0.23s;
    border-radius: 14px;
    border: 1.5px solid #e3e7f0;
    background: #f8f9fb;
}
.product-card-men:hover {
    box-shadow: 0 0.6rem 2rem rgba(13,110,253,0.13);
    border-color: #b4cdf6;
}
.product-img-container-men {
    height: 340px;
    background: #e3e7f0;
    border-radius: 14px 14px 0 0;
    display: flex;
    align-items: center;
    justify-content: center;
}
.product-img-men {
    height: 325px;
    width: 100%;
    object-fit: cover;
    object-position: top;
    transition: transform 0.33s;
}
.product-img-container-men:hover .product-img-men {
    transform: scale(1.05) rotate(-0.5deg);
}
.quick-view-btn-men {
    opacity: 0;
    transition: opacity 0.3s;
    pointer-events: none;
    font-weight: 600;
}
.product-img-container-men:hover .quick-view-btn-men {
    opacity: 1;
    pointer-events: auto;
}
.card-title {
    font-size: 1.16rem;
}
</style>
@endpush