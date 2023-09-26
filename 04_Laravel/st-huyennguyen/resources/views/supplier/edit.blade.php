@extends('layout.app')
@section('title', 'Edit supplier')
@section('PageName', 'Edit supplier')
@section('content')
    <div class="card-header pb-0">
        <h6>Edit supplier</h6>
    </div>
    <form action="{{ route('suppliers.update', ['supplier' => $supplier['id']]) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Company ID</label>
            <input name="company_id" class="form-control" type="text" value="{{ $supplier['company_id'] }}">
        </div>
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Company Name</label>
            <input name="company_name" class="form-control" type="text" value="{{ $supplier['company_name'] }}">
        </div>
        <div class="form-group">
            <label for="example-search-input" class="form-control-label">Transaction Name</label>
            <input name="transaction_name" class="form-control" type="text" value="{{ $supplier['transaction_name'] }}">
        </div>
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Address</label>
            <input name="address" class="form-control" type="text" value="{{ $supplier['address'] }}">
        </div>
        <div class="form-group">
            <label for="example-email-input" class="form-control-label">Email</label>
            <input name="email" class="form-control" type="email" value="{{ $supplier['email'] }}">
        </div>
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Phone</label>
            <input name="phone" class="form-control" type="text" value="{{ $supplier['phone'] }}">
        </div>
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Fax</label>
            <input name="fax" class="form-control" type="text" value="{{ $supplier['fax'] }}">
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
