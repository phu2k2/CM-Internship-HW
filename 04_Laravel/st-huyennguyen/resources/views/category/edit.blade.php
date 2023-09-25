@extends('layout.app')
@section('title', 'Edit Category')
@section('PageName', 'Edit Category')
@section('content')
    <div class="card-header pb-0">
        <h6>Edit Category</h6>
    </div>
    <form action="{{ route('categories.update', ['category' => $category['id']]) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Category ID</label>
            <input name="category_id" class="form-control" type="text" value="{{ $category['category_id'] }}">
        </div>
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Category Name</label>
            <input name="category_name" class="form-control" type="text" value="{{ $category['category_name'] }}">
        </div>
        <div class="form-group col-12 row">
            <div class="col-6">
                <a href="{{ url()->previous() }}" type="button" class="btn bg-gradient-danger">Cancel</a>
            </div>
            <div class="col-6 text-end">
                <input type="submit" value="submit" class="btn bg-gradient-dark mb-0">
            </div>
        </div>
    </form>
@endsection
