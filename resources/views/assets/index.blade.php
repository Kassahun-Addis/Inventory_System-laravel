@extends('layouts.app')

@section('title', 'Assets')

@section('content')
<div class="container mt-5">
    <h2>Assets</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('assets.create') }}" class="btn btn-primary">Add New Asset</a>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>Asset Name</th>
                <th>Category</th>
                <th>Purchase Price</th>
                <th>Status</th>
                <th>Assigned To</th>
                <th>Department</th>
                <th>Purchase Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($assets as $asset)
                <tr>
                    <td>{{ $asset->asset_name }}</td>
                    <td>{{ $asset->category }}</td>
                    <td>{{ $asset->purchase_price }}</td>
                    <td>{{ $asset->status }}</td>
                    <td>{{ $asset->assigned_to }}</td>
                    <td>{{ $asset->department }}</td>
                    <td>{{ $asset->purchase_date }}</td>
                    <td>
                        <!-- Add action buttons if needed -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
