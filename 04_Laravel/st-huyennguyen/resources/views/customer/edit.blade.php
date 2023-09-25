@extends('layout.app')
@section('title', 'Edit Customer')
@section('PageName', 'Edit Customer')
@section('content')
    <div class="card-header pb-0">
        <h6>Edit Customer</h6>
    </div>
    <form action="{{ route('customers.update', ['customer' => $customer['id']]) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Company Name</label>
            <input name="company_name" class="form-control" type="text" value="{{ $customer['company_name'] }}">
        </div>
        <div class="form-group">
            <label for="example-search-input" class="form-control-label">Transaction Name</label>
            <input name="transaction_name" class="form-control" type="text" value="{{ $customer['transaction_name'] }}">
        </div>
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Address</label>
            <input name="address" class="form-control" type="text" value="{{ $customer['address'] }}">
        </div>
        <div class="form-group">
            <label for="example-email-input" class="form-control-label">Email</label>
            <input name="email" class="form-control" type="email" value="{{ $customer['email'] }}">
        </div>
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Phone</label>
            <input name="phone" class="form-control" type="text" value="{{ $customer['phone'] }}">
        </div>
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Fax</label>
            <input name="fax" class="form-control" type="text" value="{{ $customer['fax'] }}">
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
