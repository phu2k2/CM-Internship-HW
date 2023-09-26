@extends('layout.app')

@section('title', 'Add Employee')

@section('content')

      <form id="employeeForm" action="{{ route('employees.store') }}" method="POST">
        @csrf
        <div class="p-5" style="width: 60%:">
            <h2 class="text-center">Add employee</h2>
            <div class="mb-3">
              <label for="inputName" class="form-label">Name</label>
              <input  type="text" class="form-control" id="inputName" name="name">
            </div>

            <div class="mb-3">
              <label for="inputPosition" class="form-label">Position</label>
              <input type="text" class="form-control" id="inputPosition" name="position">
            </div>

            <div class="mb-3">
              <label for="inputOffice" class="form-label">Office</label>
              <input type="text" class="form-control" id="inputOffice" name="office">
            </div>

            <div class="mb-3">
              <label for="inputAge" class="form-label">Age</label>
              <input type="number" class="form-control" id="inputAge" name="age">
            </div>

            <div class="mb-3">
              <label for="inputStartDate" class="form-label">Start Date</label>
              <input type="date" class="form-control" id="inputStartDate" name="start_date">
            </div>
            <div class="mb-3">
              <label for="inputSalary" class="form-label">Salary</label>
              <input type="number" class="form-control" id="inputSalary" name="salary">
            </div>
        </div>
        
        <!-- Modal Footer -->
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Add Employee</button>
        </div>
        
    </form>
     
@endsection