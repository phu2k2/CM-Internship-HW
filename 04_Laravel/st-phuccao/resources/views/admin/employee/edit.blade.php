@extends('admin.layouts.main')

@section('pageName')
   <a href="#">Edit Employee</a>
@endsection

@section('title')
   <a href="#">Edit Employee</a>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-body">
            <form class="form-horizontal mt-4">
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" value="{{ $employee['last_name'] }}">
                </div>
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control"  value="{{ $employee['first_name'] }}">
                </div>
                <div class="form-group">
                    <label>Birthday</label>
                    <input type="text" class="form-control"  value="{{ $employee['birthday'] }}">
                </div>
                <div class="form-group">
                    <label>Start Date</label>
                    <input type="text" class="form-control"  value="{{ $employee['start_date'] }}">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control"  value="{{ $employee['address'] }}">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" class="form-control"  value="{{ $employee['phone'] }}">
                </div>
                <div class="form-group">
                    <label>Base Salary</label>
                    <input type="text" class="form-control"  value="{{ $employee['base_salary'] }}">
                </div>
                <div class="form-group">
                    <label>Allowance</label>
                    <input type="text" class="form-control"  value="{{ $employee['allowance'] }}">
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
