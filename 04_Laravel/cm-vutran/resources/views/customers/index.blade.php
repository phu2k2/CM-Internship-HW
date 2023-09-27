@extends('layout.app')

@section('title', 'Customers Management')

@section('content')

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Customers Management
        <a class="btn btn-primary mx-5" href="{{ route('customers.create') }}">
            Add Customer
        </a>

    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>company_id</th>
                    <th>transaction_name</th>
                    <th>address</th>
                    <th>email</th>
                    <th>phone_number</th>
                    <th>fax</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>STT</th>
                    <th>company_name</th>
                    <th>transaction_name</th>
                    <th>address</th>
                    <th>email</th>
                    <th>phone_number</th>
                    <th>fax</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>

                @foreach ($customers as $customer)
                <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{ $customer['companyId'] }}</td>
                    <td>{{ $customer['transactionName'] }}</td>
                    <td>{{ $customer['address'] }}</td>
                    <td>{{ $customer['email'] }}</td>
                    <td>{{ $customer['phoneNumber'] }}</td>
                    <td>{{ $customer['fax'] }}</td>
                    <td>
                        <a class="btn btn-success" href="">Edit</a>
                        <a class="btn btn-danger" href="">Delete</a>
                    </td>
                </tr>
                @endforeach


            </tbody>
        </table>
    </div>
</div>

@endsection
