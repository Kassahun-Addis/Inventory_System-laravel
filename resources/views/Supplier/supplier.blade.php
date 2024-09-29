@extends('layouts.app')

@section('title', 'Supplier - Add New')

@section('content')
    <header class="header" style="background-color: #4caf50;">
        <h2>Supplier, Add New</h2>
    </header>

        <div class="form-section mt-4">
            <h3>Supplier Information</h3>
            <form action="{{ route('supplier.store') }}" method="POST">            @csrf
                <div class = "row">
                <div class="col-md-6">
                <div class="form-group">
                    <label for="first_name" class="required">First Name</label>
                    <input type="text" id="first_name" name="first_name" required>
                </div>
                <div class="form-group">
                    <label for="last_name" class="required">Last Name</label>
                    <input type="text" id="last_name" name="last_name" required>
                </div>
                <div class="form-group">
                    <label for="company" class="required">Company</label>
                    <input type="text" id="company" name="company" required>
                </div>
                <div class="form-group">
                    <label for="address" class="required">Address</label>
                    <input type="text" id="address" name="address" required>
                </div>
                <div class="form-group">
                    <label for="contact_person" class="required">Contact Person</label>
                    <input type="text" id="contact_person" name="contact_person" required>
                </div>
                <div class="form-group">
                    <label for="phone_no" class="required">Phone No</label>
                    <input type="text" id="phone_no" name="phone_no" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email" class="required">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="tin_no" class="required">Tin No</label>
                    <input type="number" id="tin_no" name="tin_no" required>
                </div>
                <div class="form-group">
                    <label for="product_type" class="required">Product Type</label>
                    <input type="text" id="product_type" name="product_type" required>
                </div>
                <div class="flex space-x-2">
                    <button type="submit" class="btn-primary">Save</button>
                    <button type="reset" class="btn-secondary">Reset</button>
                    <a href="{{ route('supplier.index') }}" class="btn btn-secondary btn-custom">Back to list</a> <!-- Updated Back to list button -->
                </div>
</div>
            </form>
        </div>
</div>
    
@endsection
</html>