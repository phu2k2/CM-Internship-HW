@extends('home')
@section('title', 'Edit Employee')
@section('pageName', 'Edit Employee')
@section('content')
<div class="col-xl">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-header">Edit Employee</h5>
        </div>
        <div class="card-body">
            <form href="{{ route('employees.update', ['employee' => $employee['id']]) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="mb-3 row">
                    <label for="html5-text-input" class="col-md-2 col-form-label">ID</label>
                    <div class="col-md-10">
                        <span id="basic-icon-default-categoryid2"
                            class="fab fa-angular fa-lg text-danger me-3">{{ $employee['id'] }}</span>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="html5-text-input" class="col-md-2 col-form-label">Employee ID</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" value="{{ $employee['employee_id'] }}"
                            id="html5-text-input" />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="html5-search-input" class="col-md-2 col-form-label">Last Name</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" value="{{ $employee['last_name'] }}"
                            id="html5-search-input" />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="html5-search-input" class="col-md-2 col-form-label">First Name</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" value="{{ $employee['first_name'] }}"
                            id="html5-search-input" />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="html5-search-input" class="col-md-2 col-form-label">Birthday</label>
                    <div class="col-md-10">
                        <input class="form-control" type="date"
                            value="{{ date('Y-m-d', strtotime($employee['birthday'])) }}" id="html5-search-input" />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="html5-search-input" class="col-md-2 col-form-label">Start Date</label>
                    <div class="col-md-10">
                        <input class="form-control" type="date"
                            value="{{ date('Y-m-d', strtotime($employee['start_date'])) }}" id="html5-search-input" />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="html5-search-input" class="col-md-2 col-form-label">Address</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" value="{{ $employee['address'] }}"
                            id="html5-search-input" />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="html5-search-input" class="col-md-2 col-form-label">Phone</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" value="{{ $employee['phone'] }}"
                            id="html5-search-input" />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="html5-search-input" class="col-md-2 col-form-label">Base Salary</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" value="{{ $employee['base_salary'] }}"
                            id="html5-search-input" />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="html5-search-input" class="col-md-2 col-form-label">Allowance</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" value="{{ $employee['allowance'] }}"
                            id="html5-search-input" />
                    </div>
                </div>
                <a href="{{ route('employees.index') }}" type="submit"
                    class="btn rounded-pill btn-outline-warning">Cancel</a>
                <button type="submit" class="btn rounded-pill btn-outline-success">Edit</button>
            </form>
        </div>
    </div>
</div>
@endsection
