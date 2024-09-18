@extends('layouts.app')

@section('title', 'Expense List')

@section('content')
<div class="container mt-5">
    <h2>Expense List</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Expense Date</th>
                <th>Expense For</th>
                <th>Amount</th>
                <th>Category</th>
                <th>Description</th>
                <th>Added Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($expenses as $expense)
            <tr>
                <td>{{ $expense->id }}</td>
                <td>{{ $expense->expense_date }}</td>
                <td>{{ $expense->expense_for }}</td>
                <td>{{ $expense->amount }}</td>
                <td>{{ $expense->expense_category }}</td>
                <td>{{ $expense->expense_description }}</td>
                <td>{{ $expense->added_date }}</td>
                <!--  -->
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
