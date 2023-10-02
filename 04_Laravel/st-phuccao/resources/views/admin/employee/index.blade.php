@extends('admin.layouts.main')

@section('pageName')
   <a href="#">Employees</a>
@endsection

@section('title')
   <a href="#">Employees</a>
@endsection

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">List Employees</h4>
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Employee ID</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Birthday</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">Address</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Base Salary</th>
                        <th scope="col">Allowance</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($employees as $item)
                    <tr>
                    <th scope="row">{{$loop->index}}</th>
                        <td>{{ $item['employee_id'] }}</td>
                        <td>{{ $item['last_name'] }}</td>
                        <td>{{ $item['first_name'] }}</td>
                        <td>{{ $item['birthday'] }}</td>
                        <td>{{ $item['start_date'] }}</td>
                        <td>{{ $item['address'] }}</td>
                        <td>{{ $item['phone'] }}</td>
                        <td>{{ $item['base_salary'] }}</td>
                        <td>{{ $item['allowance'] }}</td>
                        <td>
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('employees.edit', ['employee' => $item['employee_id']]) }}"
                                aria-expanded="false">
                                <i class="mdi mdi-account-edit"></i>
                                <span class="hide-menu">Edit</span>
                            </a>
                        </td>
                        <td>
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href=""
                                aria-expanded="false">
                                <i class="mdi mdi-account-remove"></i>
                                <span class="hide-menu">Delete</span>
                            </a>
                        </td>
                    </tr>
                @endforeach   
                </tbody>
            </table>
            <div class="form-group">
                <div class="col-sm-12">
                    <button class="btn btn-success text-white"><a href="{{ route('employees.create') }}">Add Employee</a></button>
                </div>
            </div> 
        </div>
    </div>
</div>
@endsection
