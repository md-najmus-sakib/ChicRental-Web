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
    
    <div class="row g-3">
        <!-- Card - 1 -->
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
            <div class="card h-100 product-card shadow-sm border-0">
                <div class="product-img-container position-relative overflow-hidden">
                    <img src="{{ asset('assets/image/suit/suit-1.jpg') }}" alt="Classic Black Suit" class="product-img card-img-top">
                    <button class="btn btn-light btn-sm quick-view-btn position-absolute top-50 start-50 translate-middle shadow"><i class="fa fa-eye"></i> Quick View</button>
                </div>
                <div class="card-body text-center py-2">
                    <h5 class="card-title mb-1">Classic Black Suit</h5>
                    <div class="text-muted" style="font-size:0.93em;">Formal</div>
                    <div class="fw-bold text-primary fs-6 mb-2">৳2200</div>
                    <div class="d-flex gap-2 justify-content-center">
                        <button class="btn btn-outline-primary btn-sm flex-fill" title="Add to Cart"><i class="fa fa-cart-plus"></i></button>
                        <button class="btn btn-primary btn-sm flex-fill fw-bold" title="Rent Now"><i class="fa fa-bag-shopping"></i> Rent Now</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card - 2 -->
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
            <div class="card h-100 product-card shadow-sm border-0">
                <div class="product-img-container position-relative overflow-hidden">
                    <img src="{{ asset('assets/image/suit/suit-1.jpg') }}" alt="Blue Wedding Tuxedo" class="product-img card-img-top">
                    <button class="btn btn-light btn-sm quick-view-btn position-absolute top-50 start-50 translate-middle shadow"><i class="fa fa-eye"></i> Quick View</button>
                </div>
                <div class="card-body text-center py-2">
                    <h5 class="card-title mb-1">Blue Wedding Tuxedo</h5>
                    <div class="text-muted" style="font-size:0.93em;">Wedding</div>
                    <div class="fw-bold text-primary fs-6 mb-2">৳2500</div>
                    <div class="d-flex gap-2 justify-content-center">
                        <button class="btn btn-outline-primary btn-sm flex-fill" title="Add to Cart"><i class="fa fa-cart-plus"></i></button>
                        <button class="btn btn-primary btn-sm flex-fill fw-bold" title="Rent Now"><i class="fa fa-bag-shopping"></i> Rent Now</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card - 3 -->
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
            <div class="card h-100 product-card shadow-sm border-0">
                <div class="product-img-container position-relative overflow-hidden">
                    <img src="{{ asset('assets/image/suit/suit-1.jpg') }}" alt="Grey Check Suit" class="product-img card-img-top">
                    <button class="btn btn-light btn-sm quick-view-btn position-absolute top-50 start-50 translate-middle shadow"><i class="fa fa-eye"></i> Quick View</button>
                </div>
                <div class="card-body text-center py-2">
                    <h5 class="card-title mb-1">Grey Check Suit</h5>
                    <div class="text-muted" style="font-size:0.93em;">Casual</div>
                    <div class="fw-bold text-primary fs-6 mb-2">৳1800</div>
                    <div class="d-flex gap-2 justify-content-center">
                        <button class="btn btn-outline-primary btn-sm flex-fill" title="Add to Cart"><i class="fa fa-cart-plus"></i></button>
                        <button class="btn btn-primary btn-sm flex-fill fw-bold" title="Rent Now"><i class="fa fa-bag-shopping"></i> Rent Now</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card - 4 -->
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
            <div class="card h-100 product-card shadow-sm border-0">
                <div class="product-img-container position-relative overflow-hidden">
                    <img src="{{ asset('assets/image/suit/suit-1.jpg') }}" alt="Ivory Festive Blazer" class="product-img card-img-top">
                    <button class="btn btn-light btn-sm quick-view-btn position-absolute top-50 start-50 translate-middle shadow"><i class="fa fa-eye"></i> Quick View</button>
                </div>
                <div class="card-body text-center py-2">
                    <h5 class="card-title mb-1">Ivory Festive Blazer</h5>
                    <div class="text-muted" style="font-size:0.93em;">Festive</div>
                    <div class="fw-bold text-primary fs-6 mb-2">৳1900</div>
                    <div class="d-flex gap-2 justify-content-center">
                        <button class="btn btn-outline-primary btn-sm flex-fill" title="Add to Cart"><i class="fa fa-cart-plus"></i></button>
                        <button class="btn btn-primary btn-sm flex-fill fw-bold" title="Rent Now"><i class="fa fa-bag-shopping"></i> Rent Now</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card - 5 -->
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
            <div class="card h-100 product-card shadow-sm border-0">
                <div class="product-img-container position-relative overflow-hidden">
                    <img src="{{ asset('assets/image/suit/suit-1.jpg') }}" alt="Velvet Maroon Suit" class="product-img card-img-top">
                    <button class="btn btn-light btn-sm quick-view-btn position-absolute top-50 start-50 translate-middle shadow"><i class="fa fa-eye"></i> Quick View</button>
                </div>
                <div class="card-body text-center py-2">
                    <h5 class="card-title mb-1">Velvet Maroon Suit</h5>
                    <div class="text-muted" style="font-size:0.93em;">Party</div>
                    <div class="fw-bold text-primary fs-6 mb-2">৳2100</div>
                    <div class="d-flex gap-2 justify-content-center">
                        <button class="btn btn-outline-primary btn-sm flex-fill" title="Add to Cart"><i class="fa fa-cart-plus"></i></button>
                        <button class="btn btn-primary btn-sm flex-fill fw-bold" title="Rent Now"><i class="fa fa-bag-shopping"></i> Rent Now</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card - 6 -->
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
            <div class="card h-100 product-card shadow-sm border-0">
                <div class="product-img-container position-relative overflow-hidden">
                    <img src="{{ asset('assets/mensuit/suit6.jpg') }}" alt="Slim Fit Navy Suit" class="product-img card-img-top">
                    <button class="btn btn-light btn-sm quick-view-btn position-absolute top-50 start-50 translate-middle shadow"><i class="fa fa-eye"></i> Quick View</button>
                </div>
                <div class="card-body text-center py-2">
                    <h5 class="card-title mb-1">Slim Fit Navy Suit</h5>
                    <div class="text-muted" style="font-size:0.93em;">Business</div>
                    <div class="fw-bold text-primary fs-6 mb-2">৳2000</div>
                    <div class="d-flex gap-2 justify-content-center">
                        <button class="btn btn-outline-primary btn-sm flex-fill" title="Add to Cart"><i class="fa fa-cart-plus"></i></button>
                        <button class="btn btn-primary btn-sm flex-fill fw-bold" title="Rent Now"><i class="fa fa-bag-shopping"></i> Rent Now</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card - 7 -->
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
            <div class="card h-100 product-card shadow-sm border-0">
                <div class="product-img-container position-relative overflow-hidden">
                    <img src="{{ asset('assets/mensuit/suit7.jpg') }}" alt="Wine Velvet Tuxedo" class="product-img card-img-top">
                    <button class="btn btn-light btn-sm quick-view-btn position-absolute top-50 start-50 translate-middle shadow"><i class="fa fa-eye"></i> Quick View</button>
                </div>
                <div class="card-body text-center py-2">
                    <h5 class="card-title mb-1">Wine Velvet Tuxedo</h5>
                    <div class="text-muted" style="font-size:0.93em;">Evening</div>
                    <div class="fw-bold text-primary fs-6 mb-2">৳2400</div>
                    <div class="d-flex gap-2 justify-content-center">
                        <button class="btn btn-outline-primary btn-sm flex-fill" title="Add to Cart"><i class="fa fa-cart-plus"></i></button>
                        <button class="btn btn-primary btn-sm flex-fill fw-bold" title="Rent Now"><i class="fa fa-bag-shopping"></i> Rent Now</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card - 8 -->
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
            <div class="card h-100 product-card shadow-sm border-0">
                <div class="product-img-container position-relative overflow-hidden">
                    <img src="{{ asset('assets/mensuit/suit8.jpg') }}" alt="White Sherwani" class="product-img card-img-top">
                    <button class="btn btn-light btn-sm quick-view-btn position-absolute top-50 start-50 translate-middle shadow"><i class="fa fa-eye"></i> Quick View</button>
                </div>
                <div class="card-body text-center py-2">
                    <h5 class="card-title mb-1">White Sherwani</h5>
                    <div class="text-muted" style="font-size:0.93em;">Traditional</div>
                    <div class="fw-bold text-primary fs-6 mb-2">৳2600</div>
                    <div class="d-flex gap-2 justify-content-center">
                        <button class="btn btn-outline-primary btn-sm flex-fill" title="Add to Cart"><i class="fa fa-cart-plus"></i></button>
                        <button class="btn btn-primary btn-sm flex-fill fw-bold" title="Rent Now"><i class="fa fa-bag-shopping"></i> Rent Now</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card - 9 -->
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
            <div class="card h-100 product-card shadow-sm border-0">
                <div class="product-img-container position-relative overflow-hidden">
                    <img src="{{ asset('assets/mensuit/suit9.jpg') }}" alt="Brown Tweed Suit" class="product-img card-img-top">
                    <button class="btn btn-light btn-sm quick-view-btn position-absolute top-50 start-50 translate-middle shadow"><i class="fa fa-eye"></i> Quick View</button>
                </div>
                <div class="card-body text-center py-2">
                    <h5 class="card-title mb-1">Brown Tweed Suit</h5>
                    <div class="text-muted" style="font-size:0.93em;">Vintage</div>
                    <div class="fw-bold text-primary fs-6 mb-2">৳1950</div>
                    <div class="d-flex gap-2 justify-content-center">
                        <button class="btn btn-outline-primary btn-sm flex-fill" title="Add to Cart"><i class="fa fa-cart-plus"></i></button>
                        <button class="btn btn-primary btn-sm flex-fill fw-bold" title="Rent Now"><i class="fa fa-bag-shopping"></i> Rent Now</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card - 10 -->
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
            <div class="card h-100 product-card shadow-sm border-0">
                <div class="product-img-container position-relative overflow-hidden">
                    <img src="{{ asset('assets/mensuit/suit10.jpg') }}" alt="Olive Green Suit" class="product-img card-img-top">
                    <button class="btn btn-light btn-sm quick-view-btn position-absolute top-50 start-50 translate-middle shadow"><i class="fa fa-eye"></i> Quick View</button>
                </div>
                <div class="card-body text-center py-2">
                    <h5 class="card-title mb-1">Olive Green Suit</h5>
                    <div class="text-muted" style="font-size:0.93em;">Trendy</div>
                    <div class="fw-bold text-primary fs-6 mb-2">৳2250</div>
                    <div class="d-flex gap-2 justify-content-center">
                        <button class="btn btn-outline-primary btn-sm flex-fill" title="Add to Cart"><i class="fa fa-cart-plus"></i></button>
                        <button class="btn btn-primary btn-sm flex-fill fw-bold" title="Rent Now"><i class="fa fa-bag-shopping"></i> Rent Now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.product-card {
    border-radius: 14px;
    transition: box-shadow 0.22s;
}
.product-card:hover {
    box-shadow: 0 0.5rem 1.3rem rgba(0,60,170,0.08);
}
.product-img-container {
    height: 170px;
    background: #f5f8fa;
    border-radius: 14px 14px 0 0;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0.3rem;
}
.product-img {
    max-height: 96%;
    max-width: 100%;
    object-fit: contain;
    transition: transform 0.25s;
}
.product-img-container:hover .product-img {
    transform: scale(1.04) rotate(-1deg);
}
.quick-view-btn {
    opacity: 0;
    transition: opacity 0.2s;
    pointer-events: none;
}
.product-img-container:hover .quick-view-btn {
    opacity: 1;
    pointer-events: auto;
}
.card-title {
    font-size: 1.03rem;
    margin-bottom: 0.18rem;
}
.card-body {
    padding: 0.65rem 0.4rem 0.85rem 0.4rem;
}
</style>
@endpush