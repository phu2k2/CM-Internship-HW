@extends('layout.app')

@section('title', 'Categories Management')

@section('content')
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Categories Management
        <a href="{{ route('categories.create') }}" class="btn btn-primary mx-5" >
            Add Category
        </a>
    </div>
    @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}    
        </div>
    @endif
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>category_id</th>
                    <th>category_name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>STT</th>
                    <th>category_id</th>
                    <th>category_name</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{ $category['categoryId'] }}</td>
                    <td>{{ $category['categoryName'] }}</td>
                    <td>
                        <a class="btn btn-success" href="">Edit</a>
                        <a class="btn btn-danger" href="">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Record</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="ID" class="form-label">ID:</label>
                        <input type="text" class="form-control" id="ID" name="ID">
                    </div>

                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category ID:</label>
                        <input type="text" class="form-control" id="category_id" name="category_id">
                    </div>

                    <div class="mb-3">
                        <label for="category_name" class="form-label">Category Name:</label>
                        <input type="text" class="form-control" id="category_name" name="category_name">
                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>

        </div>
    </div>
</div>
@endsection
