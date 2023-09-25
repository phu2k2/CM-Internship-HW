@extends('layout.app')

@section('title', 'Add Supply')

@section('content')
        <!-- Modal Body -->
    <form id="supplyForm" action="{{ route('supplies.store') }}" method="POST">
      @csrf
        <div class="p-5" style="width: 60%:">
            <h2 class="text-center">Add Supply</h2>
          <!-- supply Form -->
            <div class="mb-3">
              <label for="inputName" class="form-label">Company Name</label>
              <input value="{{ old('company_name') }}" type="text" class="form-control" id="inputName" name="company_name">
              @error('company_name')
                    <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="inputPosition" class="form-label">Transaction Name</label>
              <input value="{{ old('transaction_name') }}" type="text" class="form-control" id="inputPosition" name="transaction_name">
              @error('transaction_name')
              <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>

            <div class="mb-3">
              <label for="inputOffice" class="form-label">Address</label>
              <input value="{{ old('address') }}" type="text" class="form-control" id="inputOffice" name="address">
            @error('address')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>

            <div class="mb-3">
              <label for="inputAge" class="form-label">Email</label>
              <input value="{{ old('email') }}" type="email" class="form-control" id="inputAge" name="email">
              @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>

            <div class="mb-3">
              <label for="inputStartDate" class="form-label">Phone Number</label>
              <input value="{{ old('phone_number') }}" type="text" class="form-control" id="inputStartDate" name="phone_number">
              @error('phone_number')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>
            <div class="mb-3">
              <label for="inputSalary" class="form-label">Fax</label>
              <input value="{{ old('fax') }}" type="text" class="form-control" id="inputSalary" name="fax">
              @error('fax')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        <!-- Modal Footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="addsupplyBtn">Add supply</button>
        </div>
        
    </form>
     
@endsection
