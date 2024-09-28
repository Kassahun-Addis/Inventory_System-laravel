@extends('layouts.app')

@section('title', 'Payment Method Category List')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Payment Method Category List</h2>
        <a href="{{ route('payment-method.category.create') }}" class="btn btn-primary">Add New</a>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <form action="{{ route('payment-method.category.index') }}" method="GET" class="form-inline">
                <div class="form-group mr-2">
                    <select name="perPage" class="form-control" onchange="this.form.submit()">
                        <option value="10" {{ request('perPage') == 10 ? 'selected' : '' }}>10</option>
                        <option value="25" {{ request('perPage') == 25 ? 'selected' : '' }}>25</option>
                        <option value="50" {{ request('perPage') == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ request('perPage') == 100 ? 'selected' : '' }}>100</option>
                    </select>
                </div>
            </form>
        </div>
        <form action="{{ route('payment-method.category.index') }}" method="GET" class="form-inline">
            <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Search" value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary ml-1">Search</button>
            </div>
        </form>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($banks as $bank)
            <tr>
                <td>{{ $bank->id }}</td>
                <td>{{ $bank->name }}</td>
                <td>
                    <a href="{{ route('payment-method-category.edit', $bank->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('payment-method.destroy', $bank->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination Links -->
    <div class="mt-3">
        {{ $banks->links() }}
    </div>
</div>
@endsection