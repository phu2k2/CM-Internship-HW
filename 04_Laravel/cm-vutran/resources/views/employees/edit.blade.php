@extends('layout.app')

@section('title', 'Edit Employee')

@section('content')

    <form id="employeeForm" action="{{ route('employees.update', ['employee' => $employee['id']]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="p-5" style="width: 60%:">
            <h2 class="text-center">Edit employee</h2>
            <div class="mb-3">
            <label for="inputName" class="form-label">Name</label>
            <input value="{{ old('name', $employee['name']) }}" type="text" class="form-control" id="inputName" name="name">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>
            <div class="mb-3">
            <label for="inputPosition" class="form-label">Position</label>
            <input value="{{ old('position', $employee['position']) }}" type="text" class="form-control" id="inputPosition" name="position">
            @error('position')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>
            <div class="mb-3">
            <label for="inputOffice" class="form-label">Office</label>
            <input value="{{ old('office', $employee['office']) }}" type="text" class="form-control" id="inputOffice" name="office">
            @error('office')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>
            <div class="mb-3">
            <label for="inputAge" class="form-label">Age</label>
            <input value="{{ old('age', $employee['age']) }}" type="number" class="form-control" id="inputAge" name="age">
            @error('age')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>

            <div class="mb-3">
            <label for="inputStartDate" class="form-label">Start Date</label>
            <input value="{{ old('start_date', $employee['startDate']) }}" type="date" class="form-control" id="inputStartDate" name="start_date">
            @error('start_date')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>
            
            <div class="mb-3">
            <label for="inputSalary" class="form-label">Salary</label>
            <input value="{{ old('salary', $employee['salary']) }}" type="number" class="form-control" id="inputSalary" name="salary">
            @error('salary')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>
        </div>
            
            <!-- Modal Footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="addEmployeeBtn">Edit Employee</button>
        </div>              
            
    </form>
        
@endsection
