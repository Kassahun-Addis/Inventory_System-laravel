@extends('layouts.app')

@section('title', 'Customer List')

@section('content')
    <div class="container mt-4">
        <h3>Customer List</h3>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Company</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>TIN Number</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                    <tr>
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->company }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>{{ $customer->phone_no }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->tin_no }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
