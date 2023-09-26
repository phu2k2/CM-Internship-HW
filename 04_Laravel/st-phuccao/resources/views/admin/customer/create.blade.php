@extends('admin.layouts.main')

@section('pageName')
   <a href="#">Add Customer</a>
@endsection

@section('title')
   <a href="#">Add Customer</a>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-body">
            <form class="form-horizontal mt-4" method="POST" action="{{ route('customers.store') }}">
                @csrf
                <div class="form-group">
                    <label>Company Name</label>
                    <input type="text" class="form-control @error('company_name') is-invalid @enderror" id="company_name" name="company_name" value = "{{ old('company_name') }}">
                    @error('company_name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Transaction Name</label>
                    <input type="text" class="form-control @error('transaction_name') is-invalid @enderror" id="transaction_name" name="transaction_name">
                    @error('transaction_name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address">
                    @error('address')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email">
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone">
                    @error('phone')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Fax</label>
                    <input type="text" class="form-control @error('fax') is-invalid @enderror" id="fax" name="fax">
                    @error('fax')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <button class="btn btn-success text-white" html-type="submit" >Add</button>
                    </div>
                </div>               
            </form>
        </div>
    </div>
</div>
@endsection
