@extends('layouts.app')

@section('title', 'Product Stock - Add New')

@section('content')
    <header class="header" style="background-color: #4caf50;">
        <h2>Product Stock, Add New</h2>
    </header>

        <div class="form-section mt-4">
            <h3>Product Information</h3>
<<<<<<< HEAD
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- <form action="#" method="POST"> -->
            <form action="{{ route('product.stock.store') }}" method="POST">
=======
            <form action="#" method="POST">
>>>>>>> origin/master
                @csrf
                <div class = "row">
                <div class="col-md-6">
                <div class="form-group">
                    <label for="product_name" class="required">Product Name</label>
                    <input type="text" id="product_name" name="product_name" required>
                </div>
                <div class="form-group">
                    <label for="category" class="required">Category</label>
                    <select id="category" name="category" required>
                        <option value="">Please select</option>
                        <option value="category1">Category 1</option>
                        <option value="category2">Category 2</option>
                        <option value="category3">Category 3</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="quantity" class="required">Quantity</label>
                    <input type="number" id="quantity" name="quantity" required>
                </div>
                <div class="form-group">
                    <label for="production_cost">Production Cost</label>
                    <input type="number" id="production_cost" name="production_cost">
                </div>
</div>
<div class="col-md-6">
                <div class="form-group">
                    <label for="selling_price" class="required">Selling Price</label>
                    <input type="number" id="selling_price" name="selling_price" required>
                </div>
                <div class="form-group">
                    <label for="alert_quantity" class="required">Alert Quantity</label>
                    <input type="number" id="alert_quantity" name="alert_quantity" required>
                </div>
                <div class="form-group">
                    <label for="details_specification">Details Specification</label>
                    <select id="details_specification" name="details_specification">
                        <option value="">Please select</option>
                        <option value="spec1">Specification 1</option>
                        <option value="spec2">Specification 2</option>
                    </select>
                </div>
                <div class="flex space-x-2">
                    <button type="submit" class="btn-primary">Save</button>
                    <button type="reset" class="btn-secondary">Reset</button>
                    <a href="#" class="btn-link">Back to list</a>
                </div>
</div>
            </form>
        </div>
</div>
    
@endsection
</html>