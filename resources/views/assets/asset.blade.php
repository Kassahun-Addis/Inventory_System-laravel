@extends('layouts.app')

@section('title', 'Product Stock - Add New')

@section('content')
<div class="container mt-5">
    <h2>Asset, Add New</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="form-section">
        <form action="{{ route('assets.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="asset_name" class="required">Asset Name</label>
                        <input type="text" class="form-control" id="asset_name" name="asset_name" required>
                    </div>
                    <div class="form-group">
                        <label for="category" class="required">Category</label>
                        <input type="text" class="form-control" id="category" name="category" required>
                    </div>
                    <div class="form-group">
                        <label for="purchase_price" class="required">Purchase Price</label>
                        <input type="number" class="form-control" id="purchase_price" name="purchase_price" required>
                    </div>
                    <div class="form-group">
                        <label for="status" class="required">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="">Please select</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="serial_no">Serial No</label>
                        <input type="text" class="form-control" id="serial_no" name="serial_no">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="assigned_to">Assigned To</label>
                        <input type="text" class="form-control" id="assigned_to" name="assigned_to">
                    </div>
                    <div class="form-group">
                        <label for="department" class="required">Department</label>
                        <input type="text" class="form-control" id="department" name="department" required>
                    </div>
                    <div class="form-group">
                        <label for="purchase_date" class="required">Purchase Date</label>
                        <input type="date" class="form-control" id="purchase_date" name="purchase_date" required>
                    </div>
                    <div class="form-group">
                        <label for="last_maintenance_date">Last Maintenance Date</label>
                        <input type="date" class="form-control" id="last_maintenance_date" name="last_maintenance_date">
                    </div>
                    <div class="form-group">
                        <label for="remark">Remark</label>
                        <textarea class="form-control" id="remark" name="remark"></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-custom">Save</button>
                <button type="reset" class="btn btn-secondary btn-custom">Reset</button>
            </div>
        </form>
    </div>
</div>
@endsection
