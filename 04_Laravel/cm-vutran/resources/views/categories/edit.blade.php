@extends('layout.app')

@section('title', 'Edit Category')

@section('content')

<form action="{{ route('categories.update', ['category' => $category['id'] ]) }}" method="POST">
  @csrf
  @method('PUT')
  <div class="p-5" style="width: 60%:">
    <h2 class="text-center">Edit Category</h2>
    <div class="mb-3">
      <label for="inputName" class="form-label">Category Name</label>
      <input value="{{ old('category_name', $category['categoryName']) }}" type="text" class="form-control"
        id="inputName" name="category_name">
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
