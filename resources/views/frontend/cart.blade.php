@extends('layouts.front')
@section('title')
    My Cart
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">Home </a> /
                <a href="{{ url('cart') }}">Cart</a>
            </h6>
        </div>
    </div>
    <div class="container py-5">
        @if ($cart_item->count() > 0)
            <div class="card shadow product_data">
                <div class="card-body">
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($cart_item as $item)
                        <div class="row product_data pt-3">
                            <div class="col-md-2 my-auto">
                                <img
                                    src="{{ asset('assets/uploads/products/' . $item->product->image) }}"
                                    alt="Cart Image"
                                    id="cart_img"
                                >
                            </div>
                            <div class="col-md-3 my-auto">
                                <h6>{{ $item->product->name }}</h6>
                            </div>
                            <div class="col-md-2 my-auto">
                                <h6>{{ $item->product->selling_price }} Br</h6>
                            </div>
                            <div class="col-md-3 my-auto">
                                @if ($item->product->qty >= $item->prod_qty)
                                    <input
                                        type="hidden"
                                        class="form-control t-r prod_id"
                                        value="{{ $item->prod_id }}"
                                    >
                                    <h6
                                        for="quantity"
                                        style="padding-left: 20px;"
                                    >Quantity</h6>
                                    <div
                                        class="col-md-3 input-group mb-3"
                                        id="form"
                                    >
                                        <div
                                            class="t-r value-button changeQty"
                                            type="button"
                                            id="decrease"
                                            {{-- value="" --}}
                                        >
                                            -</div>

                                        <input
                                            type="number"
                                            id="number"
                                            value="{{ $item->prod_qty }}"
                                            min="1"
                                            class="t-r qty_input"
                                        />
                                        <div
                                            class="t-r value-button changeQty"
                                            type="button"
                                            id="increase"
                                            {{-- value=""    --}}
                                        >
                                            +</div>
                                    </div>
                                @else
                                    <h6>Out of Stock</h6>
                                @endif
                            </div>
                            <div class="col-md-2 my-auto">
                                <button class="btn btn-danger delete-cart-item"><i class="fa fa-shopping-cart"></i>Remove</button>
                            </div>
                        </div>
                        @php
                            $total += $item->product->selling_price * $item->prod_qty;
                        @endphp
                    @endforeach
                    {{-- </div> --}}
                    {{-- </div> --}}
                </div>
                <div class="card-footer">
                    <h6>Total Price: {{ $total }} Br
                        <a
                            href="{{ url('checkout') }}"
                            class="btn btn-outline-success float-end"
                        >Check Out</a>
                    </h6>
                </div>
            </div>
        @else
            <div class="card-body text-center">
                <h2>Your <i class="fa fa-shopping-cart"></i>Cart is empty</h2>
                <a
                    href="{{ url('category') }}"
                    class="btn btn-outline-primary float-end"
                >Continue Shopping</a>
            </div>
        @endif
    </div>
@endsection
