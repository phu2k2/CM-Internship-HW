@extends('admin.layouts.admin')
@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">

                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label for="formGroupExampleInput"> Company Name </label>
                                    <input type="text" class="form-control" id="formGroupExampleInput"
                                        placeholder="Company Name ">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Transaction Name</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2"
                                        placeholder="Transaction Name">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Email</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2"
                                        placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Address</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput"
                                        placeholder="Address">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Phone</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput"
                                        placeholder="Phone">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Fax</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Fax">
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
