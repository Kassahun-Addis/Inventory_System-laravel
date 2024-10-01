@extends('layouts.app')

@section('title', 'Employee - Add New')

@section('content')
<div class="container mt-4">
    <h3>Employees Information</h3>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="form-section">
        <form action="{{ route('employee.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="first_name" class="required">First Name</label>
                        <input type="text" id="first_name" name="first_name" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="last_name" class="required">Last Name</label>
                        <input type="text" id="last_name" name="last_name" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="phone_no" class="required">Phone No</label>
                        <input type="number" id="phone_no" name="phone_no" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="contactinfo" class="required">Contact Info</label>
                        <input type="text" id="contactinfo" name="contactinfo" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="position" class="required">Position</label>
                        <input type="text" id="position" name="position" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="department" class="required">Department</label>
                        <input type="text" id="department" name="department" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="HireDate" class="required">Hire Date</label>
                        <input type="date" id="HireDate" name="HireDate" required class="form-control">
                    </div>
                </div>
            </div>
            
            <div class="row mt-4">
                <div class="col-12 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary mx-2">Save</button>
                    <button type="reset" class="btn btn-secondary mx-2">Reset</button>
                    <a href="{{ route('employee.index') }}" class="btn btn-secondary mx-2 btn-custom">Back to list</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection