@extends('layout.app')

@section('title', 'Supplies Management')

@section('content')
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Supplies Management
        <a class="btn btn-primary mx-5" href="{{ route('supplies.create') }}">
            Add Supply
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
                    <td>{{ $supplie->company_id }}</td>
                    <td>{{ $supplie->company_name }}</td>
                    <td>{{ $supplie->transaction_name }}</td>
                    <td>{{ $supplie->address }}</td>
                    <td>{{ $supplie->email }}</td>
                    <td>{{ $supplie->phone_number }}</td>
                    <td>{{ $supplie->fax }}</td>
                    <td>
                        <div class="d-flex">
                            <a class="btn btn-success mx-3"
                                href="{{ route('supplies.edit', ['supply' => $supplie->id]) }}">Edit</a>
                            <form method="POST" action="{{ route('supplies.destroy', ['supply' => $supplie->id]) }}"
                                onsubmit="return confirm('Are you sure you want to delete this supply?')">
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
@endsection
