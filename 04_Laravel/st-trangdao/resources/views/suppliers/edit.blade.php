@extends('home')
@section('title','Edit Supplier')
@section('PageName', 'Edit Supplier')
@section('content')
<div class="col-xl">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-header">Edit Supplier</h5>
        </div>
    <div class="card-body">
    <form href="{{ route('suppliers.update', ['supplier' => $supplier['id']]) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="mb-3 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">ID</label>
            <div class="col-md-10">
            <span id="basic-icon-default-categoryid2" class="fab fa-angular fa-lg text-danger me-3"
            >{{$supplier['id']}}</span>
            </div>
        </div>
        <div class="mb-3 row">
        <label for="html5-text-input" class="col-md-2 col-form-label">Company ID</label>
        <div class="col-md-10">
            <input class="form-control" type="text" value="{{$supplier['company_id']}}" id="html5-text-input" />
        </div>
        </div>
        <div class="mb-3 row">
        <label for="html5-text-input" class="col-md-2 col-form-label">Company Name</label>
        <div class="col-md-10">
            <input class="form-control" type="text" value="{{$supplier['company_name']}}" id="html5-text-input" />
        </div>
        </div>
        <div class="mb-3 row">
        <label for="html5-search-input" class="col-md-2 col-form-label">Transaction Name</label>
        <div class="col-md-10">
            <input class="form-control" type="text" value="{{$supplier['transaction_name']}}" id="html5-search-input" />
        </div>
        </div>
        <div class="mb-3 row">
        <label for="html5-search-input" class="col-md-2 col-form-label">Address</label>
        <div class="col-md-10">
            <input class="form-control" type="text" value="{{$supplier['address']}}" id="html5-search-input" />
        </div>
        </div>
        <div class="mb-3 row">
        <label for="html5-search-input" class="col-md-2 col-form-label">Email</label>
        <div class="col-md-10">
            <input class="form-control" type="text" value="{{$supplier['email']}}" id="html5-search-input" />
        </div>
        </div>
        <div class="mb-3 row">
        <label for="html5-search-input" class="col-md-2 col-form-label">Phone</label>
        <div class="col-md-10">
            <input class="form-control" type="text" value="{{$supplier['phone']}}" id="html5-search-input" />
        </div>
        </div>
        <div class="mb-3 row">
        <label for="html5-search-input" class="col-md-2 col-form-label">Fax</label>
        <div class="col-md-10">
            <input class="form-control" type="text" value="{{$supplier['fax']}}" id="html5-search-input" />
        </div>
        </div>
        <a href="{{ route('suppliers.index') }}"  type="submit" class="btn rounded-pill btn-outline-warning">Cancel</a>
        <button type="submit" class="btn rounded-pill btn-outline-success">Edit</button>
    </form>
    </div>
</div>
@endsection
