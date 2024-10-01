@extends('layouts.app')

@section('title', 'Edit Product Stock')

@section('content')
<div class="container mt-5">
    <h2>Edit Product Stock</h2>

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
        <form action="{{ route('product.stock.update', $bank->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Method spoofing for PUT -->
            <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="product_name" class="required">Product Name</label>
                    <input type="text" class="form-control" id="product_name" name="product_name" value="{{ old('product_name', $bank->product_name) }}" required>
                    </div>
                <div class="form-group">
                    <label for="category" class="required">Category</label>
                    <input type="text" class="form-control" id="category" name="category" value="{{ old('category', $bank->category) }}" required>
                    </div>
                <div class="form-group">
                    <label for="quantity" class="required">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity', $bank->quantity) }}" required>
                    </div>
                <div class="form-group">
                    <label for="production_cost" class="required">Production Cost</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $bank->production_cost) }}" required>
                    </div>
            </div>

            <div class="col-md-6">
            <div class="form-group">
                    <label for="selling_price" class="required">Selling Price</label>
                    <input type="text" class="form-control" id="selling_price" name="selling_price" value="{{ old('selling_price', $bank->selling_price) }}" required>
                    </div>
                <div class="form-group">
                    <label for="alert_quantity" class="required">Alert Quantity</label>
                    <input type="number" class="form-control" id="alert_quantity" name="alert_quantity" value="{{ old('alert_quantity', $bank->alert_quantity) }}" required>
                    </div>
                <div class="form-group">
                    <label for="details_specification" class="required">Details Specification</label>
                    <input type="text" class="form-control" id="details_specification" name="details_specification" value="{{ old('details_specification', $bank->details_specification) }}" required>
                    </div>
            </div>
        </div>

        <!-- Centered buttons -->
        <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="btn btn-primary btn-custom">Update</button>
                <a href="{{ route('product.stock.index') }}" class="btn btn-secondary btn-custom">Cancel</a>
            </div>
        </div>
        </form>
    </div>
</div>
@endsection
