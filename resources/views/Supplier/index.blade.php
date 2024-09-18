@extends('layouts.app')

@section('title', 'Supplier')

@section('content')
<div class="container mt-5">
    <h2>Assets</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('supplier.create') }}" class="btn btn-primary">Add New Supplier</a>

    <table class="table mt-4">
        <thead>
            <tr>
                   <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Company</th>
                    <th>Address</th>
                    <th>Contact Person</th>
                    <th>Phone No</th>
                    <th>Email</th>
                    <th>TIN No</th>
                    <th>Product Type</th>
                    <th>Created At</th>
                    <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($suppliers as $supplier)
                    <tr>
                        <td>{{ $supplier->id }}</td>
                        <td>{{ $supplier->first_name }}</td>
                        <td>{{ $supplier->last_name }}</td>
                        <td>{{ $supplier->company }}</td>
                        <td>{{ $supplier->address }}</td>
                        <td>{{ $supplier->contact_person }}</td>
                        <td>{{ $supplier->phone_no }}</td>
                        <td>{{ $supplier->email }}</td>
                        <td>{{ $supplier->tin_no }}</td>
                        <td>{{ $supplier->create_at }}</td>
                        <td>
                            <!-- Add action buttons if needed -->
                        </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
