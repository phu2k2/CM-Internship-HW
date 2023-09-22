@extends('admin.layouts.layout1')

@section('modal')
<div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="addEmployeeModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="addEmployeeModal">Thêm nhân viên</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @if ($errors->any())
            @section('modalTrigger')document.querySelector('[data-bs-target="#addEmployeeModal"]').click();@endsection
            @endif
            <form action="{{ route('employees.store') }}" id="addEmployeeForm">
                <label>Tên công ty</label>
                <input class="form-control" placeholder="Họ"/>
                <label>Họ</label>
                <input class="form-control" placeholder="Tên"/>
                <label>Sinh nhật</label>
                <input class="form-control" placeholder="Sinh nhật"/>
                <label>Ngày bắt đầu làm việc</label>
                <input type="date" class="form-control" placeholder="Ngày bắt đầu làm việc"/>
                <label>Địa chỉ</label>
                <input type="date" class="form-control" placeholder="Địa chỉ"/>
                <label>Số điện thoại</label>
                <input class="form-control" placeholder="Số điện thoại"/>
                <label>Lương cứng</label>
                <input class="form-control" placeholder="Lương cứng"/>
                <label>Trợ cấp</label>
                <input class="form-control" placeholder="Trợ cấp"/>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" form="addEmployeeForm">Thêm nhân viên</button>
        </div>
      </div>
    </div>
</div>
@endsection


@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Nhân viên</h6>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEmployeeModal">Thêm nhân viên</button>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        STT</th>
                                    <th
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Họ</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Tên</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Sinh nhật</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Ngày bắt đầu làm việc</th>

                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Địa chỉ</th>    

                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Số điện thoại</th>    

                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Lương cứng</th>   

                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Trợ cấp</th>   
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Hành động</th>   

                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $index => $employee)
                                <tr>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0 text-center">{{$index + 1}}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$employee->last_name}}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$employee->first_name}}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$employee->birthday}}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$employee->start_date}}</p>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold">{{$employee->address}}</span>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold">{{$employee->phone}}</span>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold">{{$employee->base_salary}}</span>
                                    </td>
                                    <td>
                                        <span class="text-xs font-weight-bold">{{$employee->allowance}}</span>
                                    </td>
                                    <td class="align-middle">
                                        <button class="btn btn-success">Edit</button>
                                        <button class="btn btn-danger">Xóa</button>
                                    </td>
                                </tr>  
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection