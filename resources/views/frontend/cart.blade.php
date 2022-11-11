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
        <div class="card shadow product_data">
            <div class="card-body">
                @php
                    $total = 0;
                @endphp
                @foreach ($cart_item as $item)
                    <div class="row product_data">
                        <div class="col-md-2 my-auto">
                            <img src="{{ asset('assets/uploads/products/' . $item->product->image) }}" alt="Cart Image"
                                id="cart_img">
                        </div>
                        <div class="col-md-3 my-auto">
                            <h6>{{ $item->product->name }}</h6>
                        </div>
                        <div class="col-md-2 my-auto">
                            <h6>{{ $item->product->selling_price }}</h6>
                        </div>
                        <div class="col-md-3 my-auto">
                            <input type="hidden" class="form-control t-r prod_id" value="{{ $item->prod_id }}">
                            <h6 for="quantity" style="padding-left: 40px;">Quantity</h6>
                            <div class="col-md-4" id="form">
                                <input class="form-control t-r value-button changeQty" type="button" id="decrease"
                                    value="-">

                                <input type="number" id="number" value="{{ $item->prod_qty }}" min="1"
                                    class="form-control t-r qty_input" />
                                <input class="form-control t-r value-button changeQty" type="button" id="increase"
                                    value="+">
                            </div>

                        </div>
                    </div>
                    <div class="col-md-2 my-auto">
                        <button class="btn btn-danger delete-cart-item"><i class="fa fa-shopping-cart"></i>Remove</button>

                    </div>
            </div>
            @php
                $total += $item->product->selling_price * $item->prod_qty;
            @endphp
            @endforeach
        </div>
        <div class="car-footer">
            <h6>Total Price: {{ $total }}</h6>
        </div>
    </div>
    </div>
@endsection
