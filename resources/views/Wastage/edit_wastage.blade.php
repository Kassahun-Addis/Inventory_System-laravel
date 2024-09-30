@extends('layouts.app')

@section('title', 'Edit Wastage')

@section('content')
<div class="container mt-5">
    <h2>Edit Wastage</h2>

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
        <form action="{{ route('wastages.update', $bank->WastageID) }}" method="POST">
            @csrf
            @method('PUT') <!-- Method spoofing for PUT -->
            <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                        <label for="Product_name" class="required">Product Name</label>
                        <input type="text" class="form-control" id="Product_name" name="Product_name" value="{{ old('Product_name', $bank->Product_name) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="Quantity" class="required">Quantity</label>
                        <input type="text" class="form-control" id="Quantity" name="Quantity" value="{{ old('Quantity', $bank->Quantity) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="WastageDate" class="required">Wastage Date</label>
                        <input type="date" class="form-control" id="WastageDate" name="WastageDate" value="{{ old('WastageDate', $bank->WastageDate) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="Reason">Reason</label>
                        <input type="text" class="form-control" id="Reason" name="Reason" value="{{ old('Reason', $bank->Reason) }}" required>
                    </div>
                
                    <div class="form-group">
                        <label for="unit" class="required">Unit</label>
                        <input type="number" class="form-control" id="unit" name="unit" value="{{ old('unit', $bank->unit) }}" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-custom">Update</button>
                <a href="{{ route('wastages.index') }}" class="btn btn-secondary btn-custom">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
