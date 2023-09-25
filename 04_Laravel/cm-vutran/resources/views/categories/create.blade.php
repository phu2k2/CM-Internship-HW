@extends('layout.app')

@section('title', 'Add Category')

@section('content')
        <!-- Modal Body -->
    <form  action="{{ route('categories.store') }}" method="POST">
        <div class="p-5" style="width: 60%:">
            <h2 class="text-center">Add Category</h2>

          <!-- Employee Form -->
            @csrf
            <div class="mb-3">
              <label for="inputName" class="form-label">Category Name</label>
              <input value="{{ old('category_name') }}" type="text" class="form-control" id="inputName" name="category_name">
              @error('category_name')
                    <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
        </div>
        
        <!-- Modal Footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="addEmployeeBtn">Add Category</button>
        </div>
        
    </form>
     
@endsection
