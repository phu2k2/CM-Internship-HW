@extends('admin.layouts.admin')
@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ URL::to('category/store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="categoryId"> Category ID </label>
                                    <input type="text" id="categoryId" name="categoryId" class="form-control"
                                        placeholder="Category ID" value="{{ old('categoryId') }}">
                                    @error('categoryId')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="categoryName">Category Name</label>
                                    <input type="text" class="form-control" id="categoryName" placeholder="Category Name"
                                        value="{{ old('categoryName') }}">
                                    @error('categoryName')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-info">Submit</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        @stop

        @section('scripts')
            <script src="{{ asset('admin/assets/vendors/js/vendor.bundle.base.js') }} "></script>
            <script src="{{ asset('admin/assets/vendors/chart.js/Chart.min.js') }}"></script>
            <script src="{{ asset('admin/assets/js/jquery.cookie.js') }}"></script>
            <script src="{{ asset('admin/assets/js/off-canvas.js') }}"></script>
            <script src="{{ asset('admin/assets/js/hoverable-collapse.js') }}"></script>

            <script src="{{ asset('admin/assets/js/misc.js') }}"></script>

            <script src="{{ asset('admin/assets/js/dashboard.js') }}"></script>
            <script src="{{ asset('admin/assets/js/todolist.js') }}"></script>

        @stop
