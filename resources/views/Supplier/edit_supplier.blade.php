@extends('layouts.app')

@section('title', 'Edit Location Category')

@section('content')
<div class="container mt-5">
    <h2>Edit Location Category</h2>

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
        <form action="{{ route('supplier.update', $bank->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Method spoofing for PUT -->
            <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="first_name" class="required">First Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $bank->first_name) }}" required>
                    </div>
                <div class="form-group">
                    <label for="last_name" class="required">Last Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $bank->last_name) }}" required>
                    </div>
                <div class="form-group">
                    <label for="company" class="required">Company</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $bank->company) }}" required>
                    </div>
                <div class="form-group">
                    <label for="address" class="required">Address</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $bank->address) }}" required>
                    </div>
                <div class="form-group">
                    <label for="contact_person" class="required">Contact Person</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $bank->contact_person) }}" required>
                    </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="phone_no" class="required">Phone No</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $bank->phone_no) }}" required>
                    </div>
                <div class="form-group">
                    <label for="email" class="required">Email</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $bank->email) }}" required>
                    </div>
                <div class="form-group">
                    <label for="tin_no" class="required">Tin No</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $bank->tin_no) }}" required>
                    </div>
                <div class="form-group">
                    <label for="product_type" class="required">Product Type</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $bank->product_type) }}" required>
                    </div>
            </div>
        </div>

        <!-- Centered buttons -->
        <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="btn btn-primary btn-custom">Update</button>
                <a href="{{ route('supplier.index') }}" class="btn btn-secondary btn-custom">Cancel</a>
            </div>
        </div>
        </form>
    </div>
</div>
@endsection
