@extends('admin.layouts.main')

@section('pageName')
   <a href="#">Edit Customer</a>
@endsection

@section('title')
   <a href="#">Edit Customer</a>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-body">
            <form class="form-horizontal mt-4" method="POST" action="{{ route('customers.store') }}">
                <div class="form-group">
                    <label>Company Name</label>
                    <input type="text" class="form-control" id="company_name" name="company_name" value = "{{ $customer['company_name'] }}">
                </div>
                <div class="form-group">
                    <label>Transaction Name</label>
                    <input type="text" class="form-control" value="{{ $customer['transaction_name'] }}">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" value="{{ $customer['address'] }}">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" value="{{ $customer['email'] }}">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" class="form-control" value="{{ $customer['phone'] }}">
                </div>
                <div class="form-group">
                    <label>Fax</label>
                    <input type="text" class="form-control" value="{{ $customer['fax'] }}">
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <button class="btn btn-success text-white">Update</button>
                    </div>
                </div>               
            </form>
        </div>
    </div>
</div>
@endsection
