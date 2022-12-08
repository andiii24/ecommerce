@extends('layouts.front')
@section('title')
    Checkout
@endsection
@section('content')
    {{-- <div class="py-3 mb-4 shadow-sm border-top"> --}}

    <div class="container mt-5">
        <form
            action="{{ url('place-order') }}"
            method="POST"
        >
            @csrf
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6>Basic Detials</h6>
                            <hr style="background-color: black">
                            <div class="row checkout-form">
                                <div class="col-md-6">
                                    <label for="">First Name</label>
                                    <input
                                        type="text"
                                        name="fname"
                                        class="form-control fname"
                                        value="{{ Auth::user()->name }}"
                                        placeholder="Enter First Name"
                                    >
                                    <span
                                        class="text-danger"
                                        id="fname_error"
                                    ></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Last Name</label>
                                    <input
                                        type="text"
                                        class="form-control lname"
                                        name="lname"
                                        value="{{ Auth::user()->lname }}"
                                        placeholder="Enter Last Name"
                                    >
                                    <span
                                        class="text-danger"
                                        id="lname_error"
                                    ></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Email</label>
                                    <input
                                        type="text"
                                        class="form-control email"
                                        name="email"
                                        value="{{ Auth::user()->email }}"
                                        placeholder="Enter Email"
                                    >
                                    <span
                                        class="text-danger"
                                        id="email_error"
                                    ></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Phone Number</label>
                                    <input
                                        type="text"
                                        class="form-control phone"
                                        name="phone"
                                        value="{{ Auth::user()->phone }}"
                                        placeholder="Enter Phone"
                                    >
                                    <span
                                        class="text-danger"
                                        id="phone_error"
                                    ></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Address 1</label>
                                    <input
                                        type="text"
                                        name="address1"
                                        class="form-control address1"
                                        value="{{ Auth::user()->address1 }}"
                                        placeholder="Enter Address 1"
                                    >
                                    <span
                                        class="text-danger"
                                        id="address1_error"
                                    ></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Address 2</label>
                                    <input
                                        type="text"
                                        name="address2"
                                        class="form-control address2"
                                        value="{{ Auth::user()->address2 }}"
                                        placeholder="Enter Address 2"
                                    >
                                    <span
                                        class="text-danger"
                                        id="address2_error"
                                    ></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">city </label>
                                    <input
                                        type="text"
                                        class="form-control city"
                                        name="city"
                                        value="{{ Auth::user()->city }}"
                                        placeholder="Enter City"
                                    >
                                    <span
                                        class="text-danger"
                                        id="city_error"
                                    ></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">State </label>
                                    <input
                                        type="text"
                                        class="form-control state"
                                        name="state"
                                        value="{{ Auth::user()->state }}"
                                        placeholder="Enter State"
                                    >
                                    <span
                                        class="text-danger"
                                        id="state_error"
                                    ></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Country </label>
                                    <input
                                        type="text"
                                        name="country"
                                        class="form-control country"
                                        value="{{ Auth::user()->country }}"
                                        placeholder="Enter Country"
                                    >
                                    <span
                                        class="text-danger"
                                        id="country_error"
                                    ></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Pin Code </label>
                                    <input
                                        type="text"
                                        name="pin"
                                        class="form-control pin"
                                        value="{{ Auth::user()->pincode }}"
                                        placeholder="Enter Pin Code"
                                    >
                                    <span
                                        class="text-danger"
                                        id="pin_error"
                                    ></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h6>Order Details</h6>
                            <hr style="background-color: black">
                            <table class="table table-striped table-bordered text-center">
                                @php
                                    $total = 0;
                                @endphp
                                @if ($cartItem->count() > 0)
                                    <thead>
                                        <tr>
                                            <th>Product name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cartItem as $item)
                                            <tr>
                                                <td>{{ $item->product->name }}</td>
                                                <td>{{ $item->prod_qty }}</td>
                                                <td>{{ $item->product->selling_price }} Br</td>
                                            </tr>
                                            @php
                                                $total += $item->product->selling_price * $item->prod_qty;
                                            @endphp
                                        @endforeach
                                    </tbody>
                            </table>
                            <hr style="background-color: black">
                            <div class="card-footer">
                                <h6>Total Price: {{ $total }} Br
                                    <button
                                        type="submit"
                                        class="btn btn-success w-100 mt-3""
                                    >Place Order | COD</button>
                                    {{-- <button
                                        type="submit"
                                        class="btn btn-primary w-100 mt-3 razorpay"
                                    >Pay with razorpay</button> --}}
                                </h6>   
                            </div>
                        @else
                            <div class="card-body text-center">
                                <h2>No products in cart</h2>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    {{-- </div> --}}
@endsection
@section('scripts')
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
@endsection
