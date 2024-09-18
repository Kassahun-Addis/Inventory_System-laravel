@extends('layouts.app')

@section('title', 'Employee - Add New')

@section('content')
        <div class="form-section mt-4">
            <h3>Employees Information</h3>
            <form action="#" method="POST">
                @csrf
                <div class ="row">
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
                    <label for="phone_no" class="required">Phone No</label>
                    <input type="number" id="phone_no" name="phone_no" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email">
                </div>
</div>
<div class="col-md-6">
                <div class="form-group">
                    <label for="contactinfo" class="required">Contact Info</label>
                    <input type="text" id="contactinfo" name="contactinfo" required>
                </div>
                <div class="form-group">
                    <label for="position" class="required">Position</label>
                    <input type="text" id="position" name="position" required>
                </div>
                <div class="form-group">
                    <label for="department" class="required">Department</label>
                    <input type="text" id="department" name="department" required>
                </div>
                <div class="form-group">
                    <label for="HireDate" class="required">Hire Date</label>
                    <input type="date" id="HireDate" name="HireDate" required>
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