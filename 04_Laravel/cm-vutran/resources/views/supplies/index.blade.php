@extends('layout.app')

@section('title', 'Supplies Management')

@section('content')
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Supplies Management
        <a class="btn btn-primary mx-5" href="{{ route('supplies.create') }}">Add Supplie</a>

    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    {{-- <th>ID</th> --}}
                    <th>company_id</th>
                    <th>company_name</th>
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
                    {{-- <th>ID</th> --}}
                    <th>company_id</th>
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
                @foreach ($supplies as $supplie)
                <tr>
                    {{-- <td>{{ $supplie['Id'] }}</td> --}}
                    <td>{{ $supplie['companyId'] }}</td>
                    <td>{{ $supplie['companyName'] }}</td>
                    <td>{{ $supplie['transactionName'] }}</td>
                    <td>{{ $supplie['address'] }}</td>
                    <td>{{ $supplie['email'] }}</td>
                    <td>{{ $supplie['phoneNumber'] }}</td>
                    <td>{{ $supplie['fax'] }}</td>
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
