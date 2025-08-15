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
                <i class="fa-solid fa-shirt text-warning"></i> Kurta Collection
            </h2>
            <div class="text-muted mb-2">
                Premium kurta for wedding, festival & casual events.
            </div>
        </div>
        <div class="col-lg-4 d-flex align-items-end justify-content-lg-end mb-2 mb-lg-0">
            <form class="d-flex w-100" method="GET" action="#">
                <input type="search" name="q" class="form-control me-2" placeholder="Search kurta...">
                <select class="form-select me-2" name="sort">
                    <option value="">Sort by</option>
                    <option value="low-high">Price: Low to High</option>
                    <option value="high-low">Price: High to Low</option>
                    <option value="new">Newest</option>
                </select>
                <button class="btn btn-warning text-dark" type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>

    <div class="row g-3">
        @php
            $kurtas = [
                ['id'=>1, 'name'=>'Mustard Festive Kurta',   'cat'=>'Festive',     'price'=>1400, 'img'=>'kurta-1.jpg',  'desc'=>'Soft cotton, elegant embroidery.'],
                ['id'=>2, 'name'=>'Ivory Wedding Kurta',     'cat'=>'Wedding',     'price'=>1600, 'img'=>'kurta-2.jpg',  'desc'=>'Premium fabric with rich detailing.'],
                ['id'=>3, 'name'=>'Sky Blue Casual Kurta',   'cat'=>'Casual',      'price'=>1200, 'img'=>'kurta-3.jpg',  'desc'=>'Lightweight & breathable for day wear.'],
                ['id'=>4, 'name'=>'Olive Green Pathani',     'cat'=>'Traditional', 'price'=>1500, 'img'=>'kurta-4.jpg',  'desc'=>'Classic pathani style for a bold look.'],
                ['id'=>5, 'name'=>'Maroon Silk Kurta',       'cat'=>'Party',       'price'=>1700, 'img'=>'kurta-5.jpg',  'desc'=>'Silk finish—perfect for evening parties.'],
                ['id'=>6, 'name'=>'Navy Kurta with Jacket',  'cat'=>'Designer',    'price'=>1900, 'img'=>'kurta-6.jpg',  'desc'=>'Comes with a stylish short jacket.'],
                ['id'=>7, 'name'=>'White Linen Kurta',       'cat'=>'Summer',      'price'=>1300, 'img'=>'kurta-7.jpg',  'desc'=>'Linen comfort for hot days.'],
                ['id'=>8, 'name'=>'Charcoal Grey Kurta',     'cat'=>'Formal',      'price'=>1550, 'img'=>'kurta-8.jpg',  'desc'=>'Minimal & classy formal look.'],
                ['id'=>9, 'name'=>'Rust Orange Kurta',       'cat'=>'Festive',     'price'=>1450, 'img'=>'kurta-9.jpg',  'desc'=>'Vibrant color that stands out.'],
                ['id'=>10,'name'=>'Bottle Green Kurta',      'cat'=>'Traditional', 'price'=>1500, 'img'=>'kurta-10.jpg', 'desc'=>'Traditional charm with modern fit.'],
            ];
        @endphp

        @foreach($kurtas as $item)
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
            <div class="card h-100 product-card shadow-sm border-0">
                <div class="product-img-container position-relative overflow-hidden">
                    <img src="{{ asset('assets/image/kurta/'.$item['img']) }}" alt="{{ $item['name'] }}" class="product-img card-img-top">
                    <button type="button"
                            class="btn btn-light btn-sm quick-view-btn position-absolute top-50 start-50 translate-middle shadow"
                            data-bs-toggle="modal" data-bs-target="#quickViewModal{{ $item['id'] }}">
                        <i class="fa fa-eye"></i> Quick View
                    </button>
                </div>

                <div class="card-body text-center py-2">
                    <h5 class="card-title mb-1">{{ $item['name'] }}</h5>
                    <div class="text-muted" style="font-size:0.93em;">{{ $item['cat'] }}</div>
                    <div class="fw-bold text-warning fs-6 mb-2">৳{{ $item['price'] }}</div>

                    <div class="d-flex gap-2 justify-content-center">
                        {{-- Add to Cart (card) --}}
                        <form method="POST" action="{{ route('cart.add') }}" class="flex-fill">
                            @csrf
                            <input type="hidden" name="name" value="{{ $item['name'] }}">
                            <input type="hidden" name="category" value="{{ $item['cat'] }}">
                            <input type="hidden" name="price" value="{{ $item['price'] }}">
                            <input type="hidden" name="image_url" value="{{ asset('assets/image/kurta/'.$item['img']) }}">
                            <input type="hidden" name="quantity" value="1">
                            <button class="btn btn-outline-warning btn-sm w-100 text-dark" title="Add to Cart">
                                <i class="fa fa-cart-plus"></i>
                            </button>
                        </form>

                        <button class="btn btn-warning btn-sm flex-fill fw-bold text-dark" title="Rent Now">
                            <i class="fa fa-bag-shopping"></i> Rent Now
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Quick View Modal --}}
        <div class="modal fade" id="quickViewModal{{ $item['id'] }}" tabindex="-1"
             aria-labelledby="quickViewLabel{{ $item['id'] }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 rounded-4">
                    <div class="modal-header border-0 pb-0">
                        <h5 class="modal-title" id="quickViewLabel{{ $item['id'] }}">{{ $item['name'] }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body pt-0">
                        <img src="{{ asset('assets/image/kurta/'.$item['img']) }}" class="img-fluid rounded mb-3"
                             alt="{{ $item['name'] }}">
                        <div class="mb-2 text-muted">{{ $item['cat'] }}</div>
                        <div class="mb-2">{{ $item['desc'] }}</div>
                        <div class="fw-bold text-warning fs-5 mb-3">৳{{ $item['price'] }}</div>

                        <div class="d-flex gap-2">
                            {{-- Add to Cart (modal) --}}
                            <form method="POST" action="{{ route('cart.add') }}" class="flex-fill">
                                @csrf
                                <input type="hidden" name="name" value="{{ $item['name'] }}">
                                <input type="hidden" name="category" value="{{ $item['cat'] }}">
                                <input type="hidden" name="price" value="{{ $item['price'] }}">
                                <input type="hidden" name="image_url" value="{{ asset('assets/image/kurta/'.$item['img']) }}">
                                <input type="hidden" name="quantity" value="1">
                                <button class="btn btn-outline-warning w-100 text-dark" title="Add to Cart">
                                    <i class="fa fa-cart-plus"></i> Cart
                                </button>
                            </form>

                            <button class="btn btn-warning flex-fill fw-bold text-dark" title="Rent Now">
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
    transition:box-shadow .22s
}
.product-card:hover{
    box-shadow:0 .5rem 1.3rem rgba(180,120,0,.08)
}
.product-img-container{
    height:180px;
    background:#fff8ea;
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
        setTimeout(() => {
            const bsAlert = new bootstrap.Alert(alertBox);
            bsAlert.close();
        }, 1000);
    }
});
</script>
@endpush