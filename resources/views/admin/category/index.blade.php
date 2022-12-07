@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Category Page</h4>
            <hr style="background-color: black">
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $cat)
                        <tr>
                            <td>{{ $cat->id }}</td>
                            <td>{{ $cat->name }}</td>
                            <td>{{ Str::limit($cat->description, 50) }}</td>
                            <td><img
                                    style="width: 70px;height:70px;"
                                    class="cate-img"
                                    src="{{ asset('assets/uploads/category/' . $cat->image) }}"
                                    alt="{{ $cat->name }} image"
                                ></td>
                            <td>
                                <a
                                    href="{{ url('edit-category/' . $cat->id) }}"
                                    class="btn btn-primary btn-sm"
                                >Edit</a>
                                <a
                                    href="{{ url('delete-category/' . $cat->id) }}"
                                    class="btn btn-danger btn-sm"
                                >Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
