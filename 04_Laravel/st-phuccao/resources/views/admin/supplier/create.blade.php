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
            <form class="form-horizontal mt-4">
                <div class="form-group">
                    <label>Company Name</label>
                    <input type="text" class="form-control" value="">
                </div>
                <div class="form-group">
                    <label>Transaction Name</label>
                    <input type="text" class="form-control" value="">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" value="">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" value="">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" class="form-control" value="">
                </div>
                <div class="form-group">
                    <label>Fax</label>
                    <input type="text" class="form-control" value="">
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
