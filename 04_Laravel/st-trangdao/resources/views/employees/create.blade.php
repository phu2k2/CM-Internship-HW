@extends('home')
@section('title','Create Employee')
@section('PageName', 'Create Employee')
@section('content')
    <div class="col-xl">
        <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Create New Employee</h5>
        </div>
        <div class="card-body">
            <form>
            <div class="mb-3">
                <label class="form-label" for="basic-icon-default-employeeid">Employee ID</label>
                <div class="input-group input-group-merge">
                <span id="basic-icon-default-employeeid2" class="input-group-text"
                    ><i class='bx bxs-barcode' ></i
                ></span>
                <input
                    type="text"
                    class="form-control"
                    id="basic-icon-default-employeeid"
                    placeholder="A001"
                    aria-label="A001"
                    aria-describedby="basic-icon-default-employeeid2"
                />
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-icon-default-lastname">Last Name</label>
                <div class="input-group input-group-merge">
                <span id="basic-icon-default-lastname2" class="input-group-text"
                    ><i class='bx bx-user-circle'></i
                ></span>
                <input
                    type="text"
                    class="form-control"
                    id="basic-icon-default-lastname"
                    placeholder="Đào"
                    aria-label="Đào"
                    aria-describedby="basic-icon-default-lastname2"
                />
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-icon-default-firstname">First Name</label>
                <div class="input-group input-group-merge">
                <span id="basic-icon-default-firstname2" class="input-group-text"
                    ><i class='bx bx-user' ></i
                ></span>
                <input
                    type="text"
                    id="basic-icon-default-firstname"
                    class="form-control"
                    placeholder="Thủy Trang"
                    aria-label="Thủy Trang"
                    aria-describedby="basic-icon-default-firstname2"
                />
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-icon-default-birthday">Birthday</label>
                <div class="input-group input-group-merge">
                <span id="basic-icon-default-birthday2" class="input-group-text"
                    ><i class='bx bx-calendar' ></i
                ></span>
                <input
                    type="date"
                    id="basic-icon-default-birthday"
                    class="form-control"
                    aria-describedby="basic-icon-default-birthday2"
                />
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-icon-default-startdate">Start Date</label>
                <div class="input-group input-group-merge">
                <span id="basic-icon-default-startdate2" class="input-group-text"
                    ><i class='bx bx-calendar-check' ></i
                ></span>
                <input
                    type="date"
                    id="basic-icon-default-startdate"
                    class="form-control"
                    aria-describedby="basic-icon-default-startdate2"
                />
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-icon-default-address">Address</label>
                <div class="input-group input-group-merge">
                <span id="basic-icon-default-address2" class="input-group-text"
                    ><i class="bx bx-buildings"></i
                ></span>
                <input
                    type="text"
                    id="basic-icon-default-address"
                    class="form-control"
                    placeholder="Đà Nẵng"
                    aria-label="Đà Nẵng"
                    aria-describedby="basic-icon-default-address2"
                />
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-icon-default-phone">Phone</label>
                <div class="input-group input-group-merge">
                <span id="basic-icon-default-phone2" class="input-group-text"
                    ><i class="bx bx-phone"></i
                ></span>
                <input
                    type="text"
                    id="basic-icon-default-phone"
                    class="form-control phone-mask"
                    placeholder="0658 799 894"
                    aria-label="0658 799 894"
                    aria-describedby="basic-icon-default-phone2"
                />
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-icon-default-basesalary">Base Salary</label>
                <div class="input-group input-group-merge">
                <span class="input-group-text"
                    ><i class='bx bx-money'></i
                ></span>
                <input
                    type="text"
                    id="basic-icon-default-email"
                    class="form-control"
                    placeholder="10000000"
                    aria-label="10000000"
                    aria-describedby="basic-icon-default-email2"
                />
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-icon-default-allowance">Allowance</label>
                <div class="input-group input-group-merge">
                <span id="basic-icon-default-allowance2" class="input-group-text"
                    ><i class='bx bx-dollar-circle' ></i
                ></span>
                <input
                    id="basic-icon-default-allowance"
                    class="form-control"
                    placeholder="500000"
                    aria-label="500000"
                    aria-describedby="basic-icon-default-fax2"
                ></input>
                </div>
            </div>
            <a href="{{ route('employees.index') }}" type="submit" class="btn rounded-pill btn-outline-warning">Cancel</a>
            <button type="submit" class="btn rounded-pill btn-outline-success">Save</button>
            </form>
        </div>
        </div>
    </div>
@endsection
