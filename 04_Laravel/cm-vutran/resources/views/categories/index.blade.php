@extends('layout.app')

@section('title', 'Categories Management')

@section('content')

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Categories Management
        <a href="{{ route('categories.create') }}" class="btn btn-primary mx-5">
            Add Category
        </a>
    </div>
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

@endsection
