@extends('layouts.app')

@section('title', 'Add New Customer')

@section('content')
    <div class="container mt-4">
        <h3>Add New Customer</h3>
        <form action="{{ route('customers.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name" class="required">Name</label>
                        <input type="text" id="name" name="name" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="company">Company</label>
                        <input type="text" id="company" name="company" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="phone_no" class="required">Phone Number</label>
                        <input type="number" id="phone_no" name="phone_no" required class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="tin_no" class="required">TIN Number</label>
                        <input type="number" id="tin_no" name="tin_no" required class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <a href="{{ route('customers.index') }}" class="btn btn-link">Back to list</a>
            </div>
        </form>
    </div>
@endsection
