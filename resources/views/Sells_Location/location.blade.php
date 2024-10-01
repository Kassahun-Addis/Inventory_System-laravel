@extends('layouts.app')

@section('title', 'Location Stock - Add New')

@section('content')
    <header class="header" style="background-color: #4caf50;">
        <h2>Location Stock, Add New</h2>
    </header>

        <div class="form-section mt-4">
            <h3>Location Information</h3>
            <form action="{{ route('location.store') }}" method="POST">
            @csrf
                <div class = "row">
                <div class="col-md-6">
                <div class="form-group">
                    <label for="location_name" class="required">Location Name</label>
                    <input type="text" id="location_name" name="location_name" required>
                </div>
        
                <div class="form-group">
                    <label for="description" class="required">Description</label>
                    <input type="number" id="description" name="description" required>
                </div>
                
                <div class="flex space-x-2">
                    <button type="submit" class="btn-primary">Save</button>
                    <button type="reset" class="btn-secondary">Reset</button>
                    <a href="{{ route('location.index') }}" class="btn btn-secondary btn-custom">Back to list</a> <!-- Updated Back to list button -->

                </div>
</div>
            </form>
        </div>
</div>
    
@endsection
</html>