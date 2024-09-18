@extends('layouts.app')

@section('title', 'Wastage - Add New')

@section('content')
    <header class="header" style="background-color: #4caf50;">
        <h2>Add New Wastage</h2>
    </header>

    <div class="form-section mt-4">
        <h3>Wastage Information</h3>
        <form action="{{ route('wastages.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Product_name" class="required">Product Name</label>
                        <input type="text" id="Product_name" name="Product_name" required>
                    </div>
                    <div class="form-group">
                        <label for="Quantity" class="required">Quantity</label>
                        <input type="number" id="Quantity" name="Quantity" required>
                    </div>
                    <div class="form-group">
                        <label for="WastageDate" class="required">Wastage Date</label>
                        <input type="date" id="WastageDate" name="WastageDate" required>
                    </div>
                    <div class="form-group">
                        <label for="Reason">Reason</label>
                        <textarea id="Reason" name="Reason"></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="unit" class="required">Unit</label>
                        <input type="text" id="unit" name="unit" required>
                    </div>
                    <div class="flex space-x-2">
                        <button type="submit" class="btn-primary">Save</button>
                        <button type="reset" class="btn-secondary">Reset</button>
                        <a href="{{ route('wastages.index') }}" class="btn-link">Back to list</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
