@extends('layouts.app')

@section('title', 'Edit Expense Category')

@section('content')
<div class="container mt-5">
    <h2>Edit Expense Category</h2>

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
        <form action="{{ route('expense.update', $bank->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Method spoofing for PUT -->
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name" class="required">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $bank->name) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="description" class="required">Description</label>
                        <input type="text" class="form-control" id="description" name="description" value="{{ old('description', $bank->description) }}" required>
                    </div>
               
           
            <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="btn btn-primary btn-custom">Update</button>
                <a href="{{ route('expense.category.index') }}" class="btn btn-secondary btn-custom">Cancel</a>
            </div>
         </div>
    </div>
        </form>
    </div>
</div>
@endsection
