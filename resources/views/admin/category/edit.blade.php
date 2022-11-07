@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit Category</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update-category/' . $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $category->name }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" value="{{ $category->slug }}" name="slug">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea class="form-control" name="description" rows="3">  {{ $category->description }}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" {{ $category->status == '1' ? 'checked' : '' }} name="status">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">popular</label>
                        <input type="checkbox" {{ $category->popular == '1' ? 'checked' : '' }} name="popular">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" class="form-control" name="meta_title" value="{{ $category->meta_title }}">
                    </div>
                    <div class="col-md-12
                            mb-3">
                        <label for="">Meta Keywords</label>
                        <textarea class="form-control" name="meta_keywords" rows="3"> {{ $category->meta_keywords }}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Description</label>
                        <textarea class="form-control" name="meta_description" rows="3"> {{ $category->meta_descrip }}</textarea>
                    </div>
                    @if ($category->image)
                        <img src="{{ asset('assets/uploads/category/' . $category->image) }}" alt="Category image"
                            style="width: 500px">
                    @endif
                    <div class="col-md-12 mb-3">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-12 mb-3">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
