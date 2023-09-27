@extends('admin.layouts.admin')
@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ URL::to('employee/update', ['id' => $employee['id']]) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="employeeId">Employee ID</label>
                                    <input type="text" class="form-control" id="employeeId" name="employeeId"
                                        placeholder="Employee ID" value="{{ old('employeeId', $employee['employeeId']) }}">
                                    @error('employeeId')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="lastName">Last Name</label>
                                            <input type="text" class="form-control" id="lastName" name="lastName"
                                                placeholder="Last Name"
                                                value="{{ old('lastName', $employee['lastName']) }}">
                                            @error('lastName')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="firstName">First Name</label>
                                            <input type="text" class="form-control" id="firstName" name="firstName"
                                                placeholder="First Name"
                                                value="{{ old('firstName', $employee['firstName']) }}">
                                            @error('firstName')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="transactionName">Birthday</label>
                                            <input type="date" class="form-control" id="birthday" name="birthday"
                                                value="{{ old('birthday', $employee['birthday']) }}">
                                            @error('birthday')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="transactionName">Start Date</label>
                                            <input type="date" class="form-control" id="startDate" name="startDate"
                                                value="{{ old('startDate', $employee['startDate']) }}">
                                            @error('startDate')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="baseSalary">Base Salary</label>
                                            <input type="number" class="form-control" id="baseSalary" name="baseSalary"
                                                placeholder="Base Salary"
                                                value="{{ old('baseSalary', $employee['baseSalary']) }}">
                                            @error('baseSalary')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="transactionName">Allowance</label>
                                            <input type="number" class="form-control" id="allowance" name="allowance"
                                                placeholder="Allowance"
                                                value="{{ old('allowance', $employee['allowance']) }}">
                                            @error('allowance')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @stop

        @section('scripts')
            <script src="{{ asset('admin/assets/vendors/js/vendor.bundle.base.js') }} "></script>
            <script src="{{ asset('admin/assets/vendors/chart.js/Chart.min.js') }}"></script>
            <script src="{{ asset('admin/assets/js/jquery.cookie.js') }}"></script>
            <script src="{{ asset('admin/assets/js/off-canvas.js') }}"></script>
            <script src="{{ asset('admin/assets/js/hoverable-collapse.js') }}"></script>

            <script src="{{ asset('admin/assets/js/misc.js') }}"></script>

            <script src="{{ asset('admin/assets/js/dashboard.js') }}"></script>
            <script src="{{ asset('admin/assets/js/todolist.js') }}"></script>

        @stop
