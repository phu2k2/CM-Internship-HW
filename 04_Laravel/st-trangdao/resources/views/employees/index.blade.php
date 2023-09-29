@extends('home')
@section('title', 'List Employees')
@section('pageName', 'List Employees')
@section('content')
    <div class="card">
        <h5 class="card-header">List Employees</h5>
        <div class="col-12 text-end">
            <a class="btn bg-gradient-dark mb-0" href="{{ route('employees.create') }}"><i
                    class="btn rounded-pill btn-outline-info">&nbsp;&nbsp;Add New</i></a>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Employee Id</th>
                        <th>Full name</th>
                        <th>Birthday</th>
                        <th>Start Date</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($employees as $key => $employee)
                        <tr>
                            <td class="fab fa-angular fa-lg text-danger me-3">{{ $key + 1 }}</td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <a
                                    href="{{ route('employees.show', ['employee' => $employee['id']]) }}">{{ $employee['employee_id'] }}</a>
                            </td>
                            <td><span
                                    class="badge bg-label-primary me-1">{{ $employee['last_name'] . ' ' . $employee['first_name'] }}</span>
                            </td>
                            <td>{{ date('m-d-Y', strtotime($employee['birthday'])) }}</td>
                            <td>{{ date('m-d-Y', strtotime($employee['start_date'])) }}</td>
                            <td>{{ $employee['address'] }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                            href="{{ route('employees.edit', ['employee' => $employee['id']]) }}"><i
                                                class="bx bx-edit-alt me-1"></i> Edit</a>
                                        <form action="{{ route('employees.destroy', ['employee' => $employee['id']]) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a class="dropdown-item"><i class="bx bx-trash me-1"></i> Delete</a>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
