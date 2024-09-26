@extends('layouts.app')

@section('title', 'Bank Category List')

@section('content')
<div class="container mt-5">
    <h2>Bank Category List</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($banks as $bank)
            <tr>
                <td>{{ $bank->bank_id }}</td>
                <td>{{ $bank->bank_name }}</td>
                <td>{{ $bank->description }}</td>
                <!--  -->
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
