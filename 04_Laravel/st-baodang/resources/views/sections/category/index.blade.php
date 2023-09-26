@extends('default')

@section('content')

    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Categories</h4>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Categories table</h5>
            <a href="{{ route('category.create') }}" type="button" class="btn btn-primary">Create</a>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Category ID</th>
                    <th>Category Name</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                @foreach($categories as $category)
                    <tr>
                        <td><span class="fw-medium">{{$category->id}}</span></td>
                        <td><a href="{{ route('category.show', $category->id) }}">{{ $category->category_id }}</a></td>
                        <td>{{ $category->category_name }}</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu" style="">
                                    <a class="dropdown-item" href="{{ route('category.edit', $category->id) }}"><i
                                            class="bx bx-edit-alt me-1"></i> Edit</a>
                                    <a class="dropdown-item" href="{{ route('category.destroy', $category->id) }}"><i
                                            class="bx bx-trash me-1"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>

@stop
