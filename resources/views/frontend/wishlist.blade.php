@extends('layouts.front')
@section('title')
    My Wishlist
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">Home </a> /
                <a href="{{ url('wishlist') }}">Wishlist</a>
            </h6>
        </div>
    </div>
    <div class="container py-5">
        <div class="card shadow">
            <div class="card-body">
                @if ($wishlist->count())
                    @foreach ($wishlist as $item)
                        <div class="row product_data pt-3">
                            <div class="col-md-2 my-auto">
                                <img
                                    src="{{ asset('assets/uploads/products/' . $item->product->image) }}"
                                    alt="Cart Image"
                                    id="cart_img"
                                >
                            </div>
                            <div class="col-md-2 my-auto">
                                <h6>{{ $item->product->name }}</h6>
                            </div>
                            <div class="col-md-2 my-auto">
                                <h6>{{ $item->product->selling_price }} Br</h6>
                            </div>
                            <div class="col-md-2 my-auto">
                                <input
                                    type="hidden"
                                    class="form-control t-r prod_id"
                                    value="{{ $item->prod_id }}"
                                >
                                @if ($item->product->qty >= $item->prod_qty)
                                    <label for="quantity">Quantity</label>
                                    <div
                                        class="col-md-3 input-group mb-3"
                                        id="form"
                                    >
                                        <div
                                            class="t-r value-button changeQty"
                                            type="button"
                                            id="decreas"
                                            {{-- value="" --}}
                                        >
                                            -</div>

                                        <input
                                            type="number"
                                            id="number"
                                            value="1"
                                            min="1"
                                            class="t-r qty_input"
                                        />
                                        <div
                                            class="t-r value-button changeQty"
                                            type="button"
                                            id="increas"
                                            {{-- value=""    --}}
                                        >
                                            +</div>
                                    </div>
                                @else
                                    <h6>Out of Stock</h6>
                                @endif
                            </div>

                            <div class="col-md-2 my-auto">
                                <button class="btn btn-success btn-sm addToCart"><i class="fa fa-shopping-cart"></i> Add To Cart</button>
                            </div>
                            <div class="col-md-2 my-auto">
                                <button class="btn btn-danger btn-sm removeWishlist"><i class="fa fa-trash"></i> Remove</button>
                            </div>
                        </div>
                    @endforeach
            </div>
        @else
            <div class="text-center">
                <h4>There are no products in your Wishlist</h4>
            </div>
            @endif
        </div>
    </div>
    </div>
@endsection
