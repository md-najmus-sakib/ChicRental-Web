@extends('layouts.app')

@section('content')
<div class="container py-4 mt-5">

    @if(session('success'))
        <div id="page-alert" class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row mb-4">
        <div class="col-lg-8">
            <h2 class="fw-bold mb-2">
                <i class="fa-solid fa-user-tie text-primary"></i> Suit Collection
            </h2>
            <div class="text-muted mb-2">
                Premium suits for wedding, business & party.
            </div>
        </div>
        <div class="col-lg-4 d-flex align-items-end justify-content-lg-end mb-2 mb-lg-0">
            <form class="d-flex w-100" method="GET" action="#">
                <input type="search" name="q" class="form-control me-2" placeholder="Search suit...">
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
        @php
            $suits = [
                ['id'=>1, 'name'=>'Classic Black Tux',      'cat'=>'Formal',     'price'=>2500, 'img'=>'suit-1.jpg',  'desc'=>'Timeless black tuxedo for formal events.'],
                ['id'=>2, 'name'=>'Navy Slim Fit Suit',     'cat'=>'Business',   'price'=>2300, 'img'=>'suit-2.jpg',  'desc'=>'Sharp navy suit for meetings.'],
                ['id'=>3, 'name'=>'Grey Two-Piece Suit',    'cat'=>'Casual',     'price'=>2000, 'img'=>'suit-3.jpg',  'desc'=>'Versatile grey with modern cut.'],
                ['id'=>4, 'name'=>'Royal Blue Suit',        'cat'=>'Party',      'price'=>2400, 'img'=>'suit-4.jpg',  'desc'=>'Bold color for standout style.'],
                ['id'=>5, 'name'=>'Checked Blazer Set',     'cat'=>'Smart',      'price'=>2100, 'img'=>'suit-5.jpg',  'desc'=>'Trendy checks, easy styling.'],
                ['id'=>6, 'name'=>'Beige Summer Suit',      'cat'=>'Summer',     'price'=>2200, 'img'=>'suit-6.jpg',  'desc'=>'Lightweight fabric for heat.'],
                ['id'=>7, 'name'=>'Charcoal Three-Piece',   'cat'=>'Formal',     'price'=>2600, 'img'=>'suit-7.jpg',  'desc'=>'Waistcoat included, premium fit.'],
                ['id'=>8, 'name'=>'Maroon Velvet Tux',      'cat'=>'Party',      'price'=>2700, 'img'=>'suit-8.jpg',  'desc'=>'Velvet sheen for evening events.'],
            ];
        @endphp

        @foreach($suits as $item)
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
            <div class="card h-100 product-card shadow-sm border-0">
                <div class="product-img-container position-relative overflow-hidden">
                    <img src="{{ asset('assets/image/suit/'.$item['img']) }}" alt="{{ $item['name'] }}" class="product-img card-img-top">
                    <button type="button"
                            class="btn btn-light btn-sm quick-view-btn position-absolute top-50 start-50 translate-middle shadow"
                            data-bs-toggle="modal" data-bs-target="#suitQuickView{{ $item['id'] }}">
                        <i class="fa fa-eye"></i> Quick View
                    </button>
                </div>

                <div class="card-body text-center py-2">
                    <h5 class="card-title mb-1">{{ $item['name'] }}</h5>
                    <div class="text-muted" style="font-size:0.93em;">{{ $item['cat'] }}</div>
                    <div class="fw-bold text-primary fs-6 mb-2">৳{{ $item['price'] }}</div>

                    <div class="d-flex gap-2 justify-content-center">
                        <form method="POST" action="{{ route('cart.add') }}" class="flex-fill">
                            @csrf
                            <input type="hidden" name="name" value="{{ $item['name'] }}">
                            <input type="hidden" name="category" value="{{ $item['cat'] }}">
                            <input type="hidden" name="price" value="{{ $item['price'] }}">
                            <input type="hidden" name="image_url" value="{{ asset('assets/image/suit/'.$item['img']) }}">
                            <input type="hidden" name="quantity" value="1">
                            <button class="btn btn-outline-primary btn-sm w-100" title="Add to Cart">
                                <i class="fa fa-cart-plus"></i>
                            </button>
                        </form>

                        <button class="btn btn-primary btn-sm flex-fill fw-bold" title="Rent Now">
                            <i class="fa fa-bag-shopping"></i> Rent Now
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Quick View Modal --}}
        <div class="modal fade" id="suitQuickView{{ $item['id'] }}" tabindex="-1"
             aria-labelledby="suitQuickViewLabel{{ $item['id'] }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 rounded-4">
                    <div class="modal-header border-0 pb-0">
                        <h5 class="modal-title" id="suitQuickViewLabel{{ $item['id'] }}">{{ $item['name'] }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body pt-0">
                        <img src="{{ asset('assets/image/suit/'.$item['img']) }}" class="img-fluid rounded mb-3"
                             alt="{{ $item['name'] }}">
                        <div class="mb-2 text-muted">{{ $item['cat'] }}</div>
                        <div class="mb-2">{{ $item['desc'] }}</div>
                        <div class="fw-bold text-primary fs-5 mb-3">৳{{ $item['price'] }}</div>

                        <div class="d-flex gap-2">
                            <form method="POST" action="{{ route('cart.add') }}" class="flex-fill">
                                @csrf
                                <input type="hidden" name="name" value="{{ $item['name'] }}">
                                <input type="hidden" name="category" value="{{ $item['cat'] }}">
                                <input type="hidden" name="price" value="{{ $item['price'] }}">
                                <input type="hidden" name="image_url" value="{{ asset('assets/image/suit/'.$item['img']) }}">
                                <input type="hidden" name="quantity" value="1">
                                <button class="btn btn-outline-primary w-100" title="Add to Cart">
                                    <i class="fa fa-cart-plus"></i> Cart
                                </button>
                            </form>

                            <button class="btn btn-primary flex-fill fw-bold" title="Rent Now">
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
.product-card{
    border-radius:14px;
    transition:
    box-shadow .22s
}
.product-card:hover{
    box-shadow:0 .5rem 1.3rem rgba(0,90,255,.10)
}
.product-img-container{
    height:180px;
    background:#eef4ff;
    border-radius:14px 14px 0 0;
    display:flex;
    align-items:center;
    justify-content:center;
    padding:.35rem
}
.product-img{
    max-height:96%;
    max-width:100%;
    object-fit:contain;
    transition:transform .25s
}
.product-img-container:hover .product-img{
    transform:scale(1.05) rotate(-1deg)
}
.quick-view-btn{
    opacity:0;
    transition:opacity .2s;
    pointer-events:none
}
.product-img-container:hover .quick-view-btn{
    opacity:1;
    pointer-events:auto
}
.card-title{
    font-size:1.03rem;
    margin-bottom:.18rem
}
.card-body{
    padding:.65rem .4rem .85rem
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {
    const alertBox = document.getElementById('page-alert');
    if (alertBox) {
        setTimeout(() => new bootstrap.Alert(alertBox).close(), 1000);
    }
});
</script>
@endpush