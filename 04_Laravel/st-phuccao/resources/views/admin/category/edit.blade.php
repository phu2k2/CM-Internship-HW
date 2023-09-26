@extends('admin.layouts.main')

@section('PageName')
   <a href="#">Edit Category</a>
@endsection

@section('Title')
   <a href="#">Edit Category</a>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-body">
            <form class="form-horizontal mt-4">
                <div class="form-group">
                    <label>Category Name</label>
                    <input type="text" class="form-control" value = "{{ $category['category_name'] }}">
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <button class="btn btn-success text-white">Add</button>
                    </div>
                </div>               
            </form>
        </div>
    </div>
</div>
@endsection
