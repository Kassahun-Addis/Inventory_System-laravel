@extends('layouts.app')

@section('title', 'Edit Bank Category')

@section('content')
<div class="container mt-5">
    <h2>Edit Bank Category</h2>

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
        <form action="{{ route('banks.update', $bank->bank_id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Method spoofing for PUT -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name" class="required">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $bank->bank_name) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="description" class="required">Description</label>
                        <input type="text" class="form-control" id="description" name="description" value="{{ old('description', $bank->description) }}" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-custom">Update</button>
                <a href="{{ route('bank.category.index') }}" class="btn btn-secondary btn-custom">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
