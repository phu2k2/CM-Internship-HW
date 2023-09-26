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
                        <div class="d-flex">
                            <a class="btn btn-success mx-3" href="{{ route('customers.edit', ['customer' => $customer['id']]) }}">Edit</a>
                            <form method="POST" action="{{ route('customers.destroy', ['customer' => $customer['id']]) }}" onsubmit="return confirm('Are you sure you want to delete this employee?')">
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

<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Record</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="transaction_name" class="form-label">Transaction Name:</label>
                        <input type="text" class="form-control" id="transaction_name" name="transaction_name">
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address:</label>
                        <input type="text" class="form-control" id="address" name="address">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>

                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Phone Number:</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number">
                    </div>

                    <div class="mb-3">
                        <label for="fax" class="form-label">Fax:</label>
                        <input type="text" class="form-control" id="fax" name="fax">
                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>

        </div>
    </div>
</div>
@endsection
