@extends('admin.layouts.main')

@section('pageName')
   <a href="#">Categories</a>
@endsection

@section('title')
   <a href="#">Supplier</a>
@endsection

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">List Categories</h4>
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category ID</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Create At</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $item)
                        <tr>
                            <th scope="row">{{$loop->index}}</th>
                            <td>{{ $item['category_id'] }}</td>
                            <td>{{ $item['category_name'] }}</td>
                            <td>{{ $item['create_at'] }}</td>
                            <td>
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('categories.edit', ['category' => $item['category_id']]) }}"
                                    aria-expanded="false">
                                    <i class="mdi mdi-account-edit"></i>
                                    <span class="hide-menu">Edit</span>
                                </a>
                            </td>
                            <td>
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('categories.destroy', ['category' => $item['category_id']]) }}"
                                    aria-expanded="false"
                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item['category_id'] }}').submit();">
                                    <i class="mdi mdi-account-remove"></i>
                                    <span class="hide-menu">Delete</span>
                                </a>
                                <form id="delete-form-{{ $item['category_id'] }}" action="{{ route('categories.destroy', ['category' => $item['category_id']]) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="form-group">
                <div class="col-sm-12">
                    <button class="btn btn-success text-white"><a href="{{ route('categories.create') }}">Add Category</a></button>
                </div>
            </div> 
        </div>
    </div>
</div>
@endsection
