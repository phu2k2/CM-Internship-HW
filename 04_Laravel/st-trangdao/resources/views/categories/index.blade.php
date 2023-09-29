@extends('home')
@section('title', 'List Categories')
@section('pageName', 'List Categories')
@section('content')
    <div class="card">
        <h5 class="card-header">List Categories</h5>
        <div class="col-12 text-end">
            <a class="btn bg-gradient-dark mb-0" href="{{ route('categories.create') }}"><i
                    class="btn rounded-pill btn-outline-info">&nbsp;&nbsp;Add New</i></a>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Category ID</th>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($categories as $key => $category)
                        <tr>
                            <td class="fab fa-angular fa-lg text-danger me-3">{{ $key + 1 }}</td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <a
                                    href="{{ route('categories.show', ['category' => $category['id']]) }}">{{ $category['category_id'] }}</a>
                            </td>
                            <td><span class="badge bg-label-primary me-1">{{ $category['category_name'] }}</span></td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                            href="{{ route('categories.edit', ['category' => $category['id']]) }}"><i
                                                class="bx bx-edit-alt me-1"></i> Edit</a>
                                        <form action="{{ route('categories.destroy', ['category' => $category['id']]) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a class="dropdown-item"><i class="bx bx-trash me-1"></i> Delete</a>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
