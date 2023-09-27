@extends('home')
@section('title','Edit Category')
@section('PageName', 'Edit Category')
@section('content')
<div class="col-xl">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-header">Edit Category</h5>
        </div>
        <div class="card-body">
        <form action="{{ route('categories.update', ['category' => $category['id']]) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="mb-3 row">
                <label for="html5-text-input" class="col-md-2 col-form-label">ID</label>
                <div class="col-md-10">
                <span id="basic-icon-default-categoryid2" class="fab fa-angular fa-lg text-danger me-1"
                >{{$category['id']}}</span>
                </div>
            </div>
            <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Category ID</label>
            <div class="col-md-10">
                <input class="form-control" type="text" value="{{$category['category_id']}}" id="html5-text-input" />
            </div>
            </div>
            <div class="mb-3 row">
            <label for="html5-search-input" class="col-md-2 col-form-label">Category Name</label>
            <div class="col-md-10">
                <input class="form-control" type="text" value="{{$category['category_name']}}" id="html5-search-input" />
            </div>
            </div>
            <a href="{{ route('categories.index') }}" type="submit" class="btn rounded-pill btn-outline-warning">Cancel</a>
            <button type="submit" class="btn rounded-pill btn-outline-success">Edit</button>
            </form>
        </div>
    </div>
</div>
@endsection
