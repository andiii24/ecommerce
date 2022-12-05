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
                                        class="form-control"
                                        placeholder="Enter First Name"
                                    >
                                </div>
                                <div class="col-md-6">
                                    <label for="">Last Name</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Enter Last Name"
                                    >
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Email</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Enter Email"
                                    >
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Phone Number</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Enter Phone"
                                    >
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Address 1</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Enter Address 1"
                                    >
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Address 2</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Enter Address 2"
                                    >
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">city </label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Enter City"
                                    >
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">State </label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Enter State"
                                    >
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Country </label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Enter Country"
                                    >
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Pin Code </label>
                                    <input
                                        type="text"
                                        class="form-control"
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
                                    @endforeach
                                </tbody>
                            </table>
                            <hr style="background-color: black">
                            <button
                                type="submit"
                                class="btn btn-primary float-end"
                            >Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    {{-- </div> --}}
@endsection