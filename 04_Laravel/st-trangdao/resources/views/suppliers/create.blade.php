@extends('home')
@section('title', 'Create Supplier')
@section('pageName', 'Create Supplier')
@section('content')
<div class="col-xl">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Create New Supplier</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('suppliers.store') }}" method="POST">
                @csrf>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-companyid">Company ID</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-companyid2" class="input-group-text"><i
                                class='bx bxs-barcode'></i></span>
                        <input type="text" class="form-control" id="basic-icon-default-companyid" placeholder="TP"
                            aria-label="TP" aria-describedby="basic-icon-default-companyid2" />
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-companyname">Company Name</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-companyname2" class="input-group-text"><i
                                class="bx bx-user"></i></span>
                        <input type="text" class="form-control" id="basic-icon-default-companyname"
                            placeholder="Công ty ABC" aria-label="Công ty ABC"
                            aria-describedby="basic-icon-default-companyname2" />
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-transactionname">Transaction Name</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-transactionname2" class="input-group-text"><i
                                class='bx bxs-barcode'></i></span>
                        <input type="text" id="basic-icon-default-transactionname" class="form-control"
                            placeholder="ACME Inc." aria-label="ACME Inc."
                            aria-describedby="basic-icon-default-transactionname2" />
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-address">Address</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-address2" class="input-group-text"><i
                                class="bx bx-buildings"></i></span>
                        <input type="text" id="basic-icon-default-address" class="form-control"
                            placeholder="ACME Inc." aria-label="ACME Inc."
                            aria-describedby="basic-icon-default-address2" />
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-email">Email</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                        <input type="text" id="basic-icon-default-email" class="form-control"
                            placeholder="john.doe@gmail.com" aria-label="john.doe@gmail.com"
                            aria-describedby="basic-icon-default-email2" />
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-phone">Phone</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-phone2" class="input-group-text"><i class="bx bx-phone"></i></span>
                        <input type="text" id="basic-icon-default-phone" class="form-control phone-mask"
                            placeholder="0658 799 894" aria-label="0658 799 894"
                            aria-describedby="basic-icon-default-phone2" />
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-fax">Fax</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-fax2" class="input-group-text"><i
                                class='bx bxs-printer'></i></span>
                        <input id="basic-icon-default-fax" class="form-control" placeholder="6587 998 941"
                            aria-label="6587 998 941" aria-describedby="basic-icon-default-fax2"></input>
                    </div>
                </div>
                <a href="{{ route('suppliers.index') }}" type="submit"
                    class="btn rounded-pill btn-outline-warning">Cancel</a>
                <button type="submit" class="btn rounded-pill btn-outline-success">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
