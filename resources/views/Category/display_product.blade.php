@extends('layouts.app')

@section('title', 'Product Category List')

@section('content')
<div class="container mt-5">
    <h2>Product Category List</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($expenses as $expense)
            <tr>
                <td>{{ $expense->id }}</td>
                <td>{{ $expense->name }}</td>
                <td>{{ $expense->description }}</td>
                <!--  -->
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
