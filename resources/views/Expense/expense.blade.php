@extends('layouts.app')

@section('title', 'Expense - Add New')

@section('content')
<div class="container mt-5">
    <h2>Add New Expense</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <div class="form-section">
        <form action="{{ route('expenses.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="expense_date" class="required">Expense Date</label>
                        <input type="date" class="form-control" id="expense_date" name="expense_date" required>
                    </div>
                    <div class="form-group">
                        <label for="expense_for" class="required">Expense For</label>
                        <input type="text" class="form-control" id="expense_for" name="expense_for" required>
                    </div>
                    <div class="form-group">
                        <label for="amount" class="required">Amount</label>
                        <input type="number" step="0.01" class="form-control" id="amount" name="amount" required>
                    </div>
                    <div class="form-group">
                        <label for="expense_category" class="required">Category</label>
                        <input type="text" class="form-control" id="expense_category" name="expense_category" required>
                    </div>
                    <div class="form-group">
                        <label for="expense_description">Description</label>
                        <textarea class="form-control" id="expense_description" name="expense_description" required></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-custom">Save</button>
                <button type="reset" class="btn btn-secondary btn-custom">Reset</button>
                <a href="{{ route('expense.category.index') }}" class="btn btn-secondary btn-custom">Back to list</a> <!-- Updated Back to list button -->

            </div>
        </form>
    </div>
</div>
@endsection
