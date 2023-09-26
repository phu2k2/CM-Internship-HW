@extends('default')

@section('content')

    <h4 class="py-3 mb-4"><span class="text-muted fw-light"><a
                href="{{ route('employee.index') }}">Employees</a> / </span>Create</h4>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">New employee</h5>
            <a href="{{ route('employee.index') }}"><i class='bx bx-arrow-back'></i></a>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('employee.store')}}">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="employee_id">Employee ID</label>
                    <input name="employee_id" type="text" class="form-control" id="employee_id"
                           placeholder="ST97"/>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">Full Name</label>
                    <div class="input-group">
                        <input name="first_name" placeholder="First Name" type="text" aria-label="First name"
                               class="form-control">
                        <input name="last_name" placeholder="Last Name" type="text" aria-label="Last name"
                               class="form-control">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="birthday" class="form-label">Birthday</label>
                    <input name="birthday" class="form-control" type="datetime-local" value="2021-06-18T12:30:00"
                           id="birthday">
                </div>
                <div class="mb-3">
                    <label for="start_date" class="form-label">Start date</label>
                    <input name="start_date" class="form-control" type="datetime-local" value="2021-06-18T12:30:00"
                           id="start_date">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="address">Address</label>
                    <textarea
                        name="address"
                        style="resize: none"
                        id="address"
                        class="form-control"
                        placeholder="363 Nguyễn Hữu Thọ, Khuê Trung, Cẩm Lệ, Đà Nẵng"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="phone">Phone No</label>
                    <input
                        name="phone"
                        type="text"
                        id="phone"
                        class="form-control phone-mask"
                        placeholder="0236 3626 989"/>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="base_salary">Base salary</label>
                    <div class="input-group input-group-merge">
                        <input
                            name="base_salary"
                            type="number"
                            id="base_salary"
                            class="form-control"
                            placeholder="4000000"/>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="allowance">Allowance</label>
                    <div class="input-group input-group-merge">
                        <input
                            name="allowance"
                            type="number"
                            id="allowance"
                            class="form-control"
                            placeholder="0"/>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@stop
