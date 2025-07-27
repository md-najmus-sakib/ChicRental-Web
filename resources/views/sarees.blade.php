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
            <form class="d-flex w-100" method="GET" action="{{ route('sarees') }}">
                <input type="search" name="q" class="form-control me-2" placeholder="Search saree..." value="{{ request('q') }}">
                <select class="form-select me-2" name="sort">
                    <option value="">Sort by</option>
                    <option value="low-high" {{ request('sort')=='low-high'?'selected':'' }}>Price: Low to High</option>
                    <option value="high-low" {{ request('sort')=='high-low'?'selected':'' }}>Price: High to Low</option>
                    <option value="new" {{ request('sort')=='new'?'selected':'' }}>Newest</option>
                </select>
                <button class="btn btn-danger" type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>

    <!-- Saree List -->
    <div class="row g-4">
        @forelse($sarees as $saree)
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card h-100 border-0 shadow-sm product-card position-relative">
                @if($saree->is_new)
                    <span class="badge bg-success position-absolute top-0 start-0 m-2">New</span>
                @elseif($saree->is_discount)
                    <span class="badge bg-warning text-dark position-absolute top-0 start-0 m-2">Offer</span>
                @endif

                <div class="product-img-container position-relative overflow-hidden">
                    <img src="{{asset('assets/image/sharre1.jpg')}}" class="card-img-top product-img" alt="{{ $saree->name }}">
                    <!-- Quick View Button (Modal trigger) -->
                    <button class="btn btn-light btn-sm quick-view-btn position-absolute top-50 start-50 translate-middle shadow" data-bs-toggle="modal" data-bs-target="#quickViewModal{{ $saree->id }}">
                        <i class="fa fa-eye"></i> Quick View
                    </button>
                    <!-- Wishlist Icon -->
                    <form method="POST" action="{{ route('wishlist.add', $saree->id) }}" class="position-absolute top-0 end-0 m-2">
                        @csrf
                        <button class="btn btn-outline-danger btn-sm rounded-circle shadow-sm" type="submit" title="Add to wishlist">
                            <i class="fa{{ $saree->in_wishlist ? 's' : 'r' }} fa-heart"></i>
                        </button>
                    </form>
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title mb-1">{{ $saree->name }}</h5>
                    <div class="mb-1 text-muted" style="font-size:0.95em;">{{ $saree->category ?? 'Saree' }}</div>
                    <div class="fw-bold text-danger fs-5 mb-1">
                        ৳{{ number_format($saree->rent_price, 0) }}
                        @if($saree->is_discount)
                        <span class="text-muted fw-normal fs-6 ms-1" style="text-decoration:line-through;">
                            ৳{{ number_format($saree->original_price,0) }}
                        </span>
                        @endif
                    </div>
                    <button class="btn btn-danger w-100 mt-2 fw-bold" onclick="window.location='{{ route('cart.add', $saree->id) }}'">
                        <i class="fa fa-cart-plus"></i> Rent Now
                    </button>
                </div>
            </div>
        </div>

        <!-- Quick View Modal -->
        <div class="modal fade" id="quickViewModal{{ $saree->id }}" tabindex="-1" aria-labelledby="quickViewModalLabel{{ $saree->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header border-0 pb-0">
                        <h5 class="modal-title" id="quickViewModalLabel{{ $saree->id }}">{{ $saree->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body row">
                        <div class="col-md-5">
                            <img src="{{ $saree->image ?? asset('assets/img/saree_default.jpg') }}" class="img-fluid rounded" alt="">
                        </div>
                        <div class="col-md-7">
                            <div class="mb-2">
                                <span class="badge bg-danger me-2">{{ $saree->category ?? 'Saree' }}</span>
                                @if($saree->is_new)
                                    <span class="badge bg-success">New Arrival</span>
                                @endif
                            </div>
                            <div class="mb-2">{{ $saree->description ?? 'Beautiful designer saree available for rent.' }}</div>
                            <div class="fw-bold text-danger fs-4 mb-2">
                                ৳{{ number_format($saree->rent_price, 0) }}
                                @if($saree->is_discount)
                                    <span class="text-muted fs-6 ms-1" style="text-decoration:line-through;">
                                        ৳{{ number_format($saree->original_price,0) }}
                                    </span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <span class="fw-bold">Size:</span> {{ $saree->size ?? 'Free Size' }}
                            </div>
                            <button class="btn btn-danger fw-bold" onclick="window.location='{{ route('cart.add', $saree->id) }}'">
                                <i class="fa fa-cart-plus"></i> Rent Now
                            </button>
                            <form method="POST" action="{{ route('wishlist.add', $saree->id) }}" class="d-inline-block ms-3">
                                @csrf
                                <button class="btn btn-outline-danger" type="submit">
                                    <i class="fa{{ $saree->in_wishlist ? 's' : 'r' }} fa-heart"></i> Wishlist
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center">
            <div class="alert alert-warning py-4 fs-5">No saree found!</div>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $sarees->links() }}
    </div>
</div>
@endsection

@push('styles')
<style>
.product-card {
    transition: box-shadow 0.25s;
}
.product-card:hover {
    box-shadow: 0 0.5rem 1.5rem rgba(220,53,69,0.12);
}
.product-img-container {
    height: 100px;
    background: #f8f9fa;
    border-radius: 8px 8px 0 0;
    position: relative;
}
.product-img {
    max-height: 98%;
    object-fit: contain;
    transition: transform 0.3s;
}
.product-img-container:hover .product-img {
    transform: scale(1.08) rotate(-1.5deg);
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
</style>
@endpush