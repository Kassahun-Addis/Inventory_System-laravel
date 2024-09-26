@extends('layouts.app')

@section('title', 'Location List')

@section('content')
<div class="container mt-5">
    <h2>Location List</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th> <!-- Fixed typo here -->
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($locations as $location) <!-- Changed variable here -->
            <tr>
                <td>{{ $location->location_id }}</td> <!-- Updated variable reference -->
                <td>{{ $location->name }}</td> <!-- Updated variable reference -->
                <td>{{ $location->description }}</td> <!-- Updated variable reference -->
                <!-- Add actions here -->
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection