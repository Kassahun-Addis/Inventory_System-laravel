@extends('layouts.app')

@section('title', 'Specification Category List')

@section('content')
<div class="container mt-5">
    <h2>Specification Category List</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($specifications as $specification)
            <tr>
                <td>{{ $specification->id }}</td>
                <td>{{ $specification->description }}</td>
                <!--  -->
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
