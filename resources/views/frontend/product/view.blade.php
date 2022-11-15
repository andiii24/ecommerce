@extends('layouts.front')
@section('title', $product->name)

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('category') }}">Collections </a> /
                <a href="{{ url('category-view/' . $product->category->slug) }}">{{ $product->category->name }}</a> /
                {{ $product->name }}
            </h6>
        </div>
    </div>
    <div class="container">
        <div class="card shadow product_data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <img src="{{ asset('assets/uploads/products/' . $product->image) }}" alt="" class="w-100">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">
                            {{ $product->name }}
                            <label for="" style="font-size: 14px"
                                class="float-end badge bg-danger trending_tag">{{ $product->trending == '1' ? 'Trending' : '' }}</label>
                        </h2>
                        <hr>
                        <label class="me-3">Original Price : <s>{{ $product->original_price }} birr</s></label>
                        <label class="fw-bold">Selling Price : {{ $product->selling_price }} birr</label>
                        <p class="mt-3">
                            {!! $product->small_description !!}
                        </p>
                        <hr>
                        @if ($product->qty > 0)
                            <label class="badge bg-success" for=""> In Stock</label>
                        @else
                            <label class="badge bg-danger" for="">Out Of Stock</label>
                        @endif
                        <div class="row mt-2">
                            <input type="hidden" value="{{ $product->id }}" class="prod_id">
                            <label for="quantity">Quantity</label>
                            @if ($product->qty > 0)
                                <div class="col-md-2" id="form">
                                    <div class="value-button" id="decrease" onclick="decreaseValue()"
                                        value="Decrease Value">-
                                    </div>
                                    <input type="number" id="number" value="1" min="1" class="qty_input" />
                                    <div class="value-button" id="increase" onclick="increaseValue()"
                                        value="Increase Value">+
                                    </div>
                                </div>
                            @endif
                            <div class="col-md-8 " style="padding-left: 70px;">
                                {{-- <br /> --}}
                                <button class="btn btn-success me-3 float-start">Add to wishlist <i
                                        class="fa fa-heart"></i></button>
                                @if ($product->qty > 0)
                                    <button class="btn btn-primary me-3 float-start addToCart">Add to Cart <i
                                            class="fa fa-shopping-cart"></i></button>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div>
                        <hr style="background-color: black;">
                    </div>
                    <div class="col-md-8">
                        <h2>Description</h2>
                        <p>{!! $product->description !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
