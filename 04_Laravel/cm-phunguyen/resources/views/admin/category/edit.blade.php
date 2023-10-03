@extends('layouts.auth')

@section('content')
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <h1 class="h3 mb-2 text-gray-800">Edit Function</h1>
            <div class="p-5">
                <form class="user">
                    <div class="form-group">
                        <h6>Category Id</h6>
                        <input type="text" class="form-control form-control-user" placeholder="Category Id"
                            value="{{ $category['category_id'] }}">
                    </div>
                    <div class="form-group">
                        <h6>Category Name</h6>
                        <input type="text" class="form-control form-control-user" placeholder="Category Name"
                            value="{{ $category['category_name'] }}">
                    </div>
                    <div class="form-group">
                        <h6>Created at</h6>
                        <input type="text" class="form-control form-control-user" placeholder="Created at"
                            value="{{ $category['created_at'] }}">
                    </div>
                    <div class="form-group">
                        <h6>Updated at</h6>
                        <input type="text" class="form-control form-control-user" placeholder="Update at"
                            value="{{ $category['updated_at'] }}">
                    </div>
                    <div class="button-container">
                        <button type="button" class="btn btn-primary"
                            onclick="window.location.href = '{{ route('categories.index') }}';">
                            Update
                        </button>
                        <button type="button" class="btn btn-secondary"
                            onclick="window.location.href = '{{ route('categories.index') }}';">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    </html>
@endsection
