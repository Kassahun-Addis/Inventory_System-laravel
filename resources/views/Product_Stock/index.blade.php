@extends('layouts.app')

@section('content')
    <h1>Product Stock List</h1>
    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Selling Price</th>
                <th>Alert Quantity</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stocks as $stock)
                <tr>
                    <td>{{ $stock->product_name }}</td>
                    <td>{{ $stock->category }}</td>
                    <td>{{ $stock->quantity }}</td>
                    <td>{{ $stock->selling_price }}</td>
                    <td>{{ $stock->alert_quantity }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
