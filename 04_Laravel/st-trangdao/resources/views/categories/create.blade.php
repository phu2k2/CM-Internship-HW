@extends('home')
@section('title','Create Category')
@section('PageName', 'Create Category')
@section('content')
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Create New Category</h5>
            </div>
            <div class="card-body">
                <form>
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-categoryid">Category ID</label>
                        <div class="input-group input-group-merge">
                        <span id="basic-icon-default-categoryid2" class="input-group-text"
                            ><i class='bx bxs-barcode' ></i
                        ></span>
                        <input
                            type="text"
                            class="form-control"
                            id="basic-icon-default-categoryid"
                            placeholder="TP"
                            aria-label="TP"
                            aria-describedby="basic-icon-default-categoryid2"
                        />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-icon-default-categoryname">Category Name</label>
                        <div class="input-group input-group-merge">
                        <span id="basic-icon-default-categoryname2" class="input-group-text"
                            ><i class='bx bx-package'></i
                        ></span>
                        <input
                            type="text"
                            id="basic-icon-default-categoryname"
                            class="form-control"
                            placeholder="Thực phẩm"
                            aria-label="Thực phẩm"
                            aria-describedby="basic-icon-default-categoryname2"
                        />
                        </div>
                    </div>
                    <a href = "{{ route('categories.index') }}" type="submit" class="btn rounded-pill btn-outline-warning">Cancel</a>
                    <button type="submit" class="btn rounded-pill btn-outline-success">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
