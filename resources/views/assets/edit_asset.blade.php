@extends('layouts.app')

@section('title', 'Edit Asset')

@section('content')
<div class="container mt-5">
    <h2>Edit Asset</h2>

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
        <form action="{{ route('assets.update', $bank->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Method spoofing for PUT -->
        <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="asset_name" class="required">Asset Name</label>
                        <input type="text" class="form-control" id="asset_name" name="asset_name" value="{{ old('asset_name', $bank->asset_name) }}" required>
                        </div>
                    <div class="form-group">
                        <label for="category" class="required">Category</label>
                        <input type="text" class="form-control" id="category" name="category" value="{{ old('category', $bank->category) }}" required>
                        </div>
                    <div class="form-group">
                        <label for="purchase_price" class="required">Purchase Price</label>
                        <input type="number" class="form-control" id="purchase_price" name="purchase_price" value="{{ old('purchase_price', $bank->purchase_price) }}" required>
                        </div>
                    <div class="form-group">
                        <label for="status" class="required">Status</label>
                        <input type="text" class="form-control" id="status" name="status" value="{{ old('status', $bank->status) }}" required>
                        </div>
                    <div class="form-group">
                        <label for="serial_no">Serial No</label>
                        <input type="text" class="form-control" id="serial_no" name="serial_no" value="{{ old('serial_no', $bank->serial_no) }}" required>
                        </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" id="description" name="description" value="{{ old('description', $bank->description) }}" required>
                        </div>
                    </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="assigned_to" class="required">Assigned To</label>
                        <input type="text" class="form-control" id="assigned_to" name="assigned_to" value="{{ old('assigned_to', $bank->assigned_to) }}" required>
                        </div>
                    <div class="form-group">
                        <label for="department" class="required">Department</label>
                        <input type="text" class="form-control" id="department" name="department" value="{{ old('department', $bank->department) }}" required>
                        </div>
                    <div class="form-group">
                        <label for="purchase_date" class="required">Purchase Date</label>
                        <input type="date" class="form-control" id="purchase_date" name="purchase_date" value="{{ old('purchase_date', $bank->purchase_date) }}" required>
                        </div>
                    <div class="form-group">
                        <label for="last_maintenance_date">Maintenance Date</label>
                        <input type="date" class="form-control" id="last_maintenance_date" name="last_maintenance_date" value="{{ old('last_maintenance_date', $bank->last_maintenance_date) }}" required>
                        </div>
                    <div class="form-group">
                        <label for="remark">Remark</label>
                        <input type="text" class="form-control" id="remark" name="remark" value="{{ old('remark', $bank->remark) }}" required>
                        </div>

                </div>
        
                <!-- Centered buttons -->
                <div class="d-flex justify-content-center mt-4">
                    <button type="submit" class="btn btn-primary btn-custom">Update</button>
                    <a href="{{ route('assets.index') }}" class="btn btn-secondary btn-custom">Cancel</a>
                </div>
        </div>
        </form>
    </div>
</div>
@endsection
