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
                                        class="form-control"
                                        value="{{ Auth::user()->name }}"
                                        placeholder="Enter First Name"
                                    >
                                </div>
                                <div class="col-md-6">
                                    <label for="">Last Name</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="lname"
                                        value="{{ Auth::user()->lname }}"
                                        placeholder="Enter Last Name"
                                    >
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Email</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="email"
                                        value="{{ Auth::user()->email }}"
                                        placeholder="Enter Email"
                                    >
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Phone Number</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="phone"
                                        value="{{ Auth::user()->phone }}"
                                        placeholder="Enter Phone"
                                    >
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Address 1</label>
                                    <input
                                        type="text"
                                        name="address1"
                                        class="form-control"
                                        value="{{ Auth::user()->address1 }}"
                                        placeholder="Enter Address 1"
                                    >
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Address 2</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="address2"
                                        value="{{ Auth::user()->address2 }}"
                                        placeholder="Enter Address 2"
                                    >
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">city </label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="city"
                                        value="{{ Auth::user()->city }}"
                                        placeholder="Enter City"
                                    >
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">State </label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="state"
                                        value="{{ Auth::user()->state }}"
                                        placeholder="Enter State"
                                    >
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Country </label>
                                    <input
                                        type="text"
                                        name="country"
                                        class="form-control"
                                        value="{{ Auth::user()->country }}"
                                        placeholder="Enter Country"
                                    >
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Pin Code </label>
                                    <input
                                        type="text"
                                        name="pin"
                                        class="form-control"
                                        value="{{ Auth::user()->pincode }}"
                                        placeholder="Enter Pin Code"
                                    >
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
                                        class="btn btn-primary float-end"
                                    >Place Order</button>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    {{-- </div> --}}
@endsection
