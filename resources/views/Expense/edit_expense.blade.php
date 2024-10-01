@extends('layouts.app')

@section('title', 'Edit Expense')

@section('content')
<div class="container mt-5">
    <h2>Edit Expense</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form-section">
        <form action="{{ route('expenses.update', $bank->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Method spoofing for PUT -->
        <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="expense_date" class="required">Expense Date</label>
                        <input type="text" class="form-control" id="expense_date" name="expense_date" value="{{ old('expense_date', $bank->expense_date) }}" required>
                        </div>
                    <div class="form-group">
                        <label for="expense_for" class="required">Expense For</label>
                        <input type="text" class="form-control" id="expense_for" name="expense_for" value="{{ old('expense_for', $bank->expense_for) }}" required>
                        </div>
                    <div class="form-group">
                        <label for="amount" class="required">Amount</label>
                        <input type="text" class="form-control" id="amount" name="amount" value="{{ old('amount', $bank->amount) }}" required>
                        </div>
                    <div class="form-group">
                        <label for="expense_category" class="required">Category</label>
                        <input type="text" class="form-control" id="expense_category" name="expense_category" value="{{ old('expense_category', $bank->expense_category) }}" required>
                        </div>
                    <div class="form-group">
                        <label for="expense_description">Description</label>
                        <input type="text" class="form-control" id="expense_description" name="expense_description" value="{{ old('expense_description', $bank->expense_description) }}" required>
                        </div>
                </div>
        
                <!-- Centered buttons -->
                <div class="d-flex justify-content-center mt-4">
                    <button type="submit" class="btn btn-primary btn-custom">Update</button>
                    <a href="{{ route('expenses.index') }}" class="btn btn-secondary btn-custom">Cancel</a>
                </div>
        </div>
        </form>
    </div>
</div>
@endsection
