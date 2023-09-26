@extends('admin.layouts.main')

@section('pageName')
   <a href="#">Suppliers</a>
@endsection

@section('title')
   <a href="#">Supplier</a>
@endsection

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">List Suppliers</h4>
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Company ID</th>
                        <th scope="col">Company Name</th>
                        <th scope="col">Transaction Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Fax</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($suppliers as $item)
                    <tr>
                        <th scope="row">{{$loop->index}}</th>
                        <td>{{ $item['company_id'] }}</td>
                        <td>{{ $item['company_name'] }}</td>
                        <td>{{ $item['transaction_name'] }}</td>
                        <td>{{ $item['address'] }}</td>
                        <td>{{ $item['phone'] }}</td>
                        <td>{{ $item['fax'] }}</td>
                        <td>{{ $item['email'] }}</td>
                        <td>
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('suppliers.edit', ['supplier' => $item['company_id']]) }}"
                                aria-expanded="false">
                                <i class="mdi mdi-account-edit"></i>
                                <span class="hide-menu">Edit</span>
                            </a>
                        </td>
                        <td>
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href=""
                                aria-expanded="false">
                                <i class="mdi mdi-account-remove"></i>
                                <span class="hide-menu">Delete</span>
                            </a>
                        </td>
                    </tr>
                @endforeach 
                </tbody>
            </table>
            <div class="form-group">
                <div class="col-sm-12">
                    <button class="btn btn-success text-white"> <a href="{{ route('suppliers.create') }}">Add Supplier</a> </button>
                </div>
            </div>   
        </div>
    </div>
</div>
@endsection
