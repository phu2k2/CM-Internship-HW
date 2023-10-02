@extends('admin.layouts.admin')
@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ URL::to('/store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="transactionName">Employee ID</label>
                                    <input type="text" class="form-control" placeholder="Employee ID">
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="transactionName">Last Name</label>
                                            <input type="text" class="form-control" placeholder="Last name">
                                        </div>
                                        <div class="col">
                                            <label for="transactionName">First Name</label>
                                            <input type="text" class="form-control" placeholder="First name">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="transactionName">Birthday</label>
                                            <input type="datetime-local" class="form-control">
                                        </div>
                                        <div class="col">
                                            <label for="transactionName">Start Date</label>
                                            <input type="datetime-local" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="transactionName">Base Salary</label>
                                            <input type="number" class="form-control" placeholder="Base Salary">
                                        </div>
                                        <div class="col">
                                            <label for="transactionName">Allowance</label>
                                            <input type="number" class="form-control" placeholder="Allowance">
                                        </div>
                                    </div>
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
