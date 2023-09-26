@extends('layout.app')
@section('title', 'Edit Employee')
@section('PageName', 'Edit Employee')
@section('content')
    <div class="card-header pb-0">
        <h6>Edit Employee</h6>
    </div>
    <form action="{{ route('employees.update', ['employee' => $employee['id']]) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Employee ID</label>
            <input name="employee_id" class="form-control" type="text" value="{{ $employee['employee_id'] }}">
        </div>
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Last Name</label>
            <input name="last_name" class="form-control" type="text" value="{{ $employee['last_name'] }}">
        </div>
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">First Name</label>
            <input name="first_name" class="form-control" type="text" value="{{ $employee['first_name'] }}">
        </div>
        <div class="form-group">
            <label for="example-search-input" class="form-control-label">Birthday</label>
            <input name="birthday" class="form-control" data-provide="datepicker" id="datepicker" type="text"
                value="{{ $employee['birthday'] }}">
        </div>
        <div class="form-group">
            <label for="example-search-input" class="form-control-label">Start Date</label>
            <input name="start_date" class="form-control" data-provide="datepicker" id="startpicker" type="text"
                value="{{ $employee['start_date'] }}">
        </div>
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Address</label>
            <input name="address" class="form-control" type="text" value="{{ $employee['address'] }}">
        </div>
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Phone</label>
            <input name="phone" class="form-control" type="text" value="{{ $employee['phone'] }}">
        </div>
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Base Salary</label>
            <input name="base_salary" class="form-control" type="number" value="{{ $employee['base_salary'] }}">
        </div>
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Allowance</label>
            <input name="allowance" class="form-control" type="number" value="{{ $employee['allowance'] }}">
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
@section('styles')
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.min.css">
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('assets/js/data-picker.js') }}"></script>
@endsection
