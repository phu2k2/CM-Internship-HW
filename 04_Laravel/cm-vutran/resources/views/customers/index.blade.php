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
    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>ID</th>
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
                    <th>ID</th>
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
                    <td>{{ $customer['id'] }}</td>
                    <td>{{ $customer['transactionName'] }}</td>
                    <td>{{ $customer['address'] }}</td>
                    <td>{{ $customer['email'] }}</td>
                    <td>{{ $customer['phoneNumber'] }}</td>
                    <td>{{ $customer['fax'] }}</td>
                    <td>
                        <div class="d-flex">
                            <a class="btn btn-success mx-3"
                                href="{{ route('customers.edit', ['customer' => $customer['id']]) }}">Edit</a>
                            <form method="POST"
                                action="{{ route('customers.destroy', ['customer' => $customer['id']]) }}"
                                onsubmit="return confirm('Are you sure you want to delete this employee?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
