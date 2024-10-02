@extends('layouts.app')

@section('title', 'Edit Employee')

@section('content')
<div class="container mt-5">
    <h2>Edit Employee</h2>

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
        <form action="{{ route('employee.update', $bank->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Method spoofing for PUT -->
            <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="first_name" class="required">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name', $bank->FirstName) }}" required>
                    </div>
                <div class="form-group">
                    <label for="last_name" class="required">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', $bank->LastName) }}" required>
                    </div>
                <div class="form-group">
                    <label for="phone_no" class="required">Phone No</label>
                    <input type="number" class="form-control" id="phone_no" name="phone_no" value="{{ old('phone_no', $bank->phone_no) }}" required>
                    </div>
                <div class="form-group">
                    <label for="email" class="required">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $bank->email) }}" required>
                    </div>
            </div>

            <div class="col-md-6">
            <div class="form-group">
                    <label for="contactinfo" class="required">contact info</label>
                    <input type="text" class="form-control" id="contactinfo" name="contactinfo" value="{{ old('contactinfo', $bank->ContactInfo) }}" required>
                    </div>
                <div class="form-group">
                    <label for="position" class="required">Position</label>
                    <input type="text" class="form-control" id="position" name="position" value="{{ old('position', $bank->Position) }}" required>
                    </div>
                <div class="form-group">
                    <label for="department" class="required">Department</label>
                    <input type="text" class="form-control" id="depaetails Specificartment" name="department" value="{{ old('department', $bank->Department) }}" required>
                    </div>
                <div class="form-group">
                    <label for="HireDate" class="required">Hire Date</label>
                    <input type="text" class="form-control" id="HireDate" name="HireDate" value="{{ old('HireDate', $bank->HireDate) }}" required>
                    </div>
            </div>
        </div>

        <!-- Centered buttons -->
        <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="btn btn-primary btn-custom">Update</button>
                <a href="{{ route('employee.index') }}" class="btn btn-secondary btn-custom">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
