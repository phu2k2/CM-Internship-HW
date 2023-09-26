@extends('default')

@section('content')

    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Employees</h4>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Employees table</h5>
            <a href="{{ route('employee.create') }}" type="button" class="btn btn-primary">Create</a>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Employee ID</th>
                    <th>Full name</th>
                    <th>Base salary</th>
                    <th>Allowance</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                @foreach($employees as $employee)
                    <tr>
                        <td><span class="fw-medium">{{$employee->id}}</span></td>
                        <td><a href="{{ route('employee.show', $employee->id) }}">{{ $employee->employee_id }}</a></td>
                        <td class=" ">{{ $employee->first_name }} {{ $employee->last_name }}</td>
                        <td class=" ">{{ $employee->base_salary }}</td>
                        <td class=" ">{{ $employee->allowance }}</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu" style="">
                                    <a class="dropdown-item" href="{{ route('employee.edit', $employee->id) }}"><i
                                            class="bx bx-edit-alt me-1"></i> Edit</a>
                                    <a class="dropdown-item" href="{{ route('employee.destroy', $employee->id) }}"><i
                                            class="bx bx-trash me-1"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
