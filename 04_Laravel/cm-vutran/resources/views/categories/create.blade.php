@extends('layout.app')

@section('title', 'Add Category')

@section('content')
<form action="{{ route('categories.store') }}" method="POST">
  @csrf
  <div class="p-5" style="width: 60%">
    <h2 class="text-center">Add Category</h2>
    <div class="mb-3">
      <label for="inputName" class="form-label">Category Name</label>
      <input type="text" class="form-control" id="inputName" name="category_name">
    </div>
  </div>

  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary" id="addEmployeeBtn">Add Category</button>
  </div>

</form>
@endsection
