@extends('layouts.front')
@section('title')
    Order Detail
@endsection

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 text-white>My Orders
                            <a
                                href="{{ url('orders') }}"
                                class="btn btn-warning text-white float-end"
                            >Back</a>
                        </h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 order-details">
                            <h4>Shipping Details</h4>
                            <hr style="background-color: black">
                            <label for="">First Name</label>
                            <div class="border">
                                {{ $orders->fname }}
                            </div>
                            <label for="">Last Name</label>
                            <div class="border">
                                {{ $orders->lname }}
                            </div>
                            <label for="">Email</label>
                            <div class="border">
                                {{ $orders->email }}
                            </div>
                            <label for="">PhoneNumber</label>
                            <div class="border">
                                {{ $orders->phone }}
                            </div>
                            <label for="">Shipping Address</label>
                            <div class="border">
                                {{ $orders->address1 }},<br>
                                {{ $orders->address2 }},<br>
                                {{ $orders->city }},<br>
                                {{ $orders->state }},
                                {{ $orders->country }}
                            </div>
                            <label for="">Zip Code</label>
                            <div class="border">
                                {{ $orders->pincode }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4 style="padding-top: 15px">Order Details</h4>
                            <hr style="background-color: black">
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders->orderItems as $item)
                                        <tr>
                                            <td>{{ $item->products->name }}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>
                                                <img
                                                    style="width: 50px;height:50px;"
                                                    class="cate-img"
                                                    src="{{ asset('assets/uploads/products/' . $item->products->image) }}"
                                                    alt="Product Image"
                                                >
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <h6 class="px-2"><span class="float-end">Grand Total: {{ $orders->total_price }} Br</span> </h6>
                            <form
                                action="{{ url('update-order/' . $orders->id) }}"
                                method="POST"
                            >
                                @method('PUT')
                                @csrf
                                <label
                                    class="mt-5 px-2"
                                    for=""
                                >Order Status</label>
                                <select
                                    class="form-select"
                                    name="order_status"
                                >
                                    <option
                                        value="0"
                                        {{ $orders->status == 0 ? 'selected' : '' }}
                                    >Pending</option>
                                    <option
                                        value="1"
                                        {{ $orders->status == 1 ? 'selected' : '' }}
                                    >Completed</option>
                                </select>
                                <button
                                    class="btn btn-primary float-end mt-3"
                                    type="submit"
                                >Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
