@extends('layouts.front')
@section('title')
    e-Commerce
@endsection
@section('content')
    @include('layouts.layout.frontslider')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Featured Products</h2>
                <div class="owl-carousel owl-theme featured-carousel">
                    @foreach ($featured_product as $prod)
                        <a href="{{ url('product-view/' . $prod->category->slug . '/' . $prod->slug) }}">
                            <div class="item">
                                <div class="card">
                                    <img
                                        src="{{ asset('assets/uploads/products/' . $prod->image) }}"
                                        alt="Product Image"
                                        style="width:300px;height:250px;margin-left: 10%; "
                                    >
                                    <div class="card-body">
                                        <h5>{{ $prod->name }}</h5>
                                        <span class="float-start">{{ $prod->selling_price }}</span>
                                        <span class="float-end"><s>{{ $prod->original_price }}</s></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Trending Categories</h2>
                <div class="owl-carousel owl-theme featured-carousel">
                    @foreach ($category as $cat)
                        <div class="item">
                            <a href="{{ url('category-view/' . $cat->slug) }}">
                                <div class="card ">

                                    <div class="card-body">
                                        <img
                                            src="{{ asset('assets/uploads/category/' . $cat->image) }}"
                                            alt="Product Image"
                                            style="width:300px;height:250px;margin-left: 10%; "
                                        >
                                        <h5>{{ $cat->name }}</h5>
                                        <p>{{ $cat->description }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('.featured-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 3
                }
            }
        })
    </script>
@endsection
