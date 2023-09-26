@extends('layout.app')

@section('title', 'Employees Management')

@section('content')

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Employees Management
        <a class="btn btn-primary mx-5" href="{{ route('employees.create') }}">
            Add Employee
        </a>
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($employees as $employee)  
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $employee['name'] }}</td>
                        <td>{{ $employee['position'] }}</td>
                        <td>{{ $employee['office'] }}</td>
                        <td>{{ $employee['age'] }}</td>
                        <td>{{ $employee['startDate'] }}</td>
                        <td>{{ $employee['salary'] }}</td>
                        <td>
                            <div class="d-flex">
                                <a class="btn btn-success mx-3" href="{{ route('employees.edit', ['employee' => $employee['id']]) }}">Edit</a>
                                <form method="POST" action="{{ route('employees.destroy', ['employee' => $employee['id']]) }}" onsubmit="return confirm('Are you sure you want to delete this employee?')">
                                    @csrf
                                    @method('DELETE')
                                
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                           
                        </td>
                    </tr>
                @endforeach
               
            </tbody>
        </table>
    </div>
</div>

@endsection
