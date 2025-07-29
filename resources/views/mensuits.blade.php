@extends('layouts.app')

@section('content')
<div class="container py-4 mt-5">
    <div class="row mb-4">
        <div class="col-lg-8">
            <h2 class="fw-bold mb-2">
                <i class="fa-solid fa-user-tie text-primary"></i> Men's Suit Collection
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
        <!-- Cards Start -->
        @php
            $suits = [
                [
                    'id'=>1, 'name'=>'Classic Black Suit', 'cat'=>'Formal', 'price'=>2200,
                    'img'=>'suit-1.jpg', 'desc'=>'Classic black suit for all formal occasions.'
                ],
                [
                    'id'=>2, 'name'=>'Blue Wedding Tuxedo', 'cat'=>'Wedding', 'price'=>2500,
                    'img'=>'suit-2.jpg', 'desc'=>'Stylish blue tuxedo for weddings and ceremonies.'
                ],
                [
                    'id'=>3, 'name'=>'Grey Check Suit', 'cat'=>'Casual', 'price'=>1800,
                    'img'=>'suit-3.jpg', 'desc'=>'Grey checked suit for parties and semi-formal looks.'
                ],
                [
                    'id'=>4, 'name'=>'Ivory Festive Blazer', 'cat'=>'Festive', 'price'=>1900,
                    'img'=>'suit-4.jpg', 'desc'=>'Ivory color festive blazer for special celebrations.'
                ],
                [
                    'id'=>5, 'name'=>'Velvet Maroon Suit', 'cat'=>'Party', 'price'=>2100,
                    'img'=>'suit-5.jpg', 'desc'=>'Luxurious maroon velvet suit for parties.'
                ],
                [
                    'id'=>6, 'name'=>'Slim Fit Navy Suit', 'cat'=>'Business', 'price'=>2000,
                    'img'=>'suit-6.jpg', 'desc'=>'Navy slim-fit suit for office and business events.'
                ],
                [
                    'id'=>7, 'name'=>'Wine Velvet Tuxedo', 'cat'=>'Evening', 'price'=>2400,
                    'img'=>'suit-7.jpg', 'desc'=>'Wine colored velvet tuxedo for evening programs.'
                ],
                [
                    'id'=>8, 'name'=>'White Sherwani', 'cat'=>'Traditional', 'price'=>2600,
                    'img'=>'suit-8.jpg', 'desc'=>'Traditional white sherwani for grand occasions.'
                ],
                [
                    'id'=>9, 'name'=>'Brown Tweed Suit', 'cat'=>'Vintage', 'price'=>1950,
                    'img'=>'suit-9.jpg', 'desc'=>'Brown classic tweed suit for vintage lovers.'
                ],
                [
                    'id'=>10, 'name'=>'Olive Green Suit', 'cat'=>'Trendy', 'price'=>2250,
                    'img'=>'suit-10.jpg', 'desc'=>'Olive green modern suit for trendy look.'
                ]
            ];
        @endphp

        @foreach($suits as $suit)
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
            <div class="card h-100 product-card shadow-sm border-0">
                <div class="product-img-container position-relative overflow-hidden">
                    <img src="{{ asset('assets/image/suit/'.$suit['img']) }}" alt="{{ $suit['name'] }}" class="product-img card-img-top">
                    <!-- Quick View Trigger -->
                    <button type="button" class="btn btn-light btn-sm quick-view-btn position-absolute top-50 start-50 translate-middle shadow"
                        data-bs-toggle="modal" data-bs-target="#quickViewModal{{ $suit['id'] }}">
                        <i class="fa fa-eye"></i> Quick View
                    </button>
                </div>
                <div class="card-body text-center py-2">
                    <h5 class="card-title mb-1">{{ $suit['name'] }}</h5>
                    <div class="text-muted" style="font-size:0.93em;">{{ $suit['cat'] }}</div>
                    <div class="fw-bold text-primary fs-6 mb-2">৳{{ $suit['price'] }}</div>
                    <div class="d-flex gap-2 justify-content-center">
                        <button class="btn btn-outline-primary btn-sm flex-fill" title="Add to Cart"><i class="fa fa-cart-plus"></i></button>
                        <button class="btn btn-primary btn-sm flex-fill fw-bold" title="Rent Now"><i class="fa fa-bag-shopping"></i> Rent Now</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="quickViewModal{{ $suit['id'] }}" tabindex="-1" aria-labelledby="quickViewLabel{{ $suit['id'] }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 rounded-4">
                    <div class="modal-header border-0 pb-0">
                        <h5 class="modal-title" id="quickViewLabel{{ $suit['id'] }}">{{ $suit['name'] }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pt-0">
                        <img src="{{ asset('assets/image/suit/'.$suit['img']) }}" class="img-fluid rounded mb-3" alt="{{ $suit['name'] }}">
                        <div class="mb-2 text-muted">{{ $suit['cat'] }}</div>
                        <div class="mb-2">{{ $suit['desc'] }}</div>
                        <div class="fw-bold text-primary fs-5 mb-2">৳{{ $suit['price'] }}</div>
                        <div class="d-flex gap-2">
                            <button class="btn btn-outline-primary flex-fill" title="Add to Cart"><i class="fa fa-cart-plus"></i> Cart</button>
                            <button class="btn btn-primary flex-fill fw-bold" title="Rent Now"><i class="fa fa-bag-shopping"></i> Rent Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <!-- Cards End -->
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