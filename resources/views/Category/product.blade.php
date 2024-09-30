@extends('layouts.app')

@section('title', 'Product Category - Add New')

@section('content')
<div class="container mt-5">
    <h2>Add New Product Category</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <div class="form-section">
        <form action="{{ route('product.category.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name" class="required">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="description" class="required">Description</label>
                        <input type="text" class="form-control" id="description" name="description" required>
                    </div>
                   
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-custom">Save</button>
                <button type="reset" class="btn btn-secondary btn-custom">Reset</button>
                <a href="{{ route('product.category.index') }}" class="btn btn-secondary btn-custom">Back to list</a> <!-- Updated Back to list button -->

            </div>
        </form>
    </div>
</div>
@endsection
