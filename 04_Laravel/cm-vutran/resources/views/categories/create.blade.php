@extends('layout.app')

@section('title', 'Add Category')

@section('content')
        <!-- Modal Body -->
        <div class="p-5" style="width: 60%:">
            <h2 class="text-center">Add Category</h2>

        @isset($success)
            <div class="alert alert-success" role="alert">
            {{ $success }}
            </div>
        @endisset
          <!-- Employee Form -->
          <form  action="{{ route('categories.store') }}" method="POST">
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