@extends('layouts.app')

@section('title', 'Edit Customer')

@section('content')
<div class="container mt-5">
    <h2>Edit Customer</h2>

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
        <form action="{{ route('customers.update', $bank->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Method spoofing for PUT -->
        <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name" class="required">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $bank->name) }}" required>
                        </div>
                    <div class="form-group">
                        <label for="company" class="required">Company</label>
                        <input type="text" class="form-control" id="company" name="company" value="{{ old('company', $bank->company) }}" required>
                        </div>
                    <div class="form-group">
                        <label for="address" class="required">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $bank->address) }}" required>
                        </div>
                    <div class="form-group">
                        <label for="phone_no" class="required">Phone No</label>
                        <input type="number" class="form-control" id="phone_no" name="phone_no" value="{{ old('phone_no', $bank->phone_no) }}" required>
                        </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $bank->email) }}" required>
                        </div>
                    <div class="form-group">
                        <label for="tin_no">TIN NO</label>
                        <input type="text" class="form-control" id="tin_no" name="tin_no" value="{{ old('tin_no', $bank->tin_no) }}" required>
                        </div>

                </div>
        
                <!-- Centered buttons -->
                <div class="d-flex justify-content-center mt-4">
                    <button type="submit" class="btn btn-primary btn-custom">Update</button>
                    <a href="{{ route('customers.index') }}" class="btn btn-secondary btn-custom">Cancel</a>
                </div>
        </div>
        </form>
    </div>
</div>
@endsection
