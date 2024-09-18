@extends('layouts.app')

@section('title', 'Wastage List')

@section('content')
<div class="container mt-5">
    <h2>Wastage List</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('wastages.create') }}" class="btn btn-primary">Add New Wastage</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Wastage Date</th>
                <th>Reason</th>
                <th>Unit</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($wastages as $wastage)
                <tr>
                    <td>{{ $wastage->WastageID }}</td>
                    <td>{{ $wastage->Product_name }}</td>
                    <td>{{ $wastage->Quantity }}</td>
                    <td>{{ $wastage->WastageDate }}</td>
                    <td>{{ $wastage->Reason }}</td>
                    <td>{{ $wastage->unit }}</td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
