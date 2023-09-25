@extends('admin.layouts.admin')
@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body" style="align-items: center">
                            <div class="row">
                                <div class="col-9">
                                    <h4 class="card-title">Management Employee</h4>
                                </div>
                                <div class="col-3">
                                    <a class="btn btn-success" href="{{ URL::to('employee/insert') }}"
                                        style="padding: 5px 30px">Add
                                        Employee</a>
                                </div>
                            </div>
                            <table class="table table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th> ID </th>
                                        <th> Employee ID </th>
                                        <th> Last Name </th>
                                        <th> Fist Name </th>
                                        <th> Birthday </th>
                                        <th> Start Date </th>
                                        <th> Address </th>
                                        <th> Phone</th>
                                        <th> Base Salary </th>
                                        <th> Allowance </th>
                                        <th> Created At </th>
                                        <th> Update At </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $employee)
                                        <tr>
                                            <td>{{ $employee['ID'] }}</td>
                                            <td>{{ $employee['Employee ID'] }}</td>
                                            <td>{{ $employee['Last Name'] }}</td>
                                            <td>{{ $employee['First Name'] }}</td>
                                            <td>{{ $employee['Birthday'] }}</td>
                                            <td>{{ $employee['Start Day'] }}</td>
                                            <td>{{ $employee['Address'] }}</td>
                                            <td>{{ $employee['Phone'] }}</td>
                                            <td>{{ $employee['Base Salary'] }}</td>
                                            <td>{{ $employee['Allowance'] }}</td>
                                            <td>{{ $employee['Created At'] }}</td>
                                            <td>{{ $employee['Updated At'] }}</td>
                                            <td>
                                                <a href="{{ URL::to('employee/update/' . $employee['ID']) }}"
                                                    class="btn btn-warning" style="padding: 0.25rem 0.5rem"><i
                                                        class="fa-solid fa-pen"></i>
                                                </a>
                                                <a class="btn btn-danger" data-toggle="modal"
                                                    style="padding: 0.25rem 0.5rem"
                                                    data-target="#myModal{{ $employee['ID'] }}"><i
                                                        class="fa-solid fa-trash-can"></i></a>
                                                <div class="modal" id="myModal{{ $employee['ID'] }}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Delete Confirmation</h4>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Are you sure you want to delete
                                                                    <b>"{{ $employee['Last Name'] }}"</b>!
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a {{-- <a href="{{ URL::to('delete/' . $item['id']) }}" --}} class="btn btn-danger">Yes</a>
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
