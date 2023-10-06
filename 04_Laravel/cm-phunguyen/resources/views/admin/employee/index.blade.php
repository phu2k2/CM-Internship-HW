@extends('layouts.auth')

@section('content')
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Employee Information</h1>


            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Employee Table</h6>
                    <div style="position: absolute; top: 10px; right: 0 ">
                        <button type="button" class="btn btn-primary"
                            onclick="window.location.href = '{{ route('employees.create') }}';">Add</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Birthday</th>
                                    <th>Start Date</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Base Salary</th>
                                    <th>Allowance</th>
                                    <th>Button</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $employee)
                                    <tr>
                                        <td>{{ $employee['employee_id'] }}</td>
                                        <td>{{ $employee['first_name'] }}</td>
                                        <td>{{ $employee['last_name'] }}</td>
                                        <td>{{ $employee['birthday'] }}</td>
                                        <td>{{ $employee['start_date'] }}</td>
                                        <td>{{ $employee['address'] }}</td>
                                        <td>{{ $employee['phone'] }}</td>
                                        <td>{{ $employee['base_salary'] }}</td>
                                        <td>{{ $employee['allowance'] }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary"
                                                onclick="window.location.href = '{{ route('employees.edit', ['employee' => $employee['id']]) }}';">Edit</button>
                                            <button type="button" class="btn btn-primary">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Birthday</th>
                            <th>Start Date</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Base Salary</th>
                            <th>Allowance</th>
                            <th>Button</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $employee)
                            <tr>
                                <td>{{ $employee['employee_id'] }}</td>
                                <td>{{ $employee['first_name'] }}</td>
                                <td>{{ $employee['last_name'] }}</td>
                                <td>{{ $employee['birthday'] }}</td>
                                <td>{{ $employee['start_date'] }}</td>
                                <td>{{ $employee['address'] }}</td>
                                <td>{{ $employee['phone'] }}</td>
                                <td>{{ $employee['base_salary'] }}</td>
                                <td>{{ $employee['allowance'] }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary"
                                        onclick="window.location.href = '{{ route('employees.edit', ['employee' => $employee['employee_id']]) }}';">Edit</button>
                                    <button type="button" class="btn btn-primary">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    </div>
    </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    </html>
@endsection
