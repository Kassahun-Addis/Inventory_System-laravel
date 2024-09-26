@extends('layouts.app')

@section('title', 'Shipment List')

@section('content')
<div class="container mt-5">
    <h2>Shipment List</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Assigned Person</th>
                <th>Carrier</th>
                <th>Shipment Date</th>
                <th>Tracking Number</th>
                <th>Shipping Address</th>
                <th>Shipping Cost</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($shipments as $shipment)
            <tr>
                <td>{{ $shipment->ShipmentID }}</td>
                <td>{{ $shipment->Assigned_person }}</td>
                <td>{{ $shipment->Carrier }}</td>
                <td>{{ $shipment->ShipmentDate }}</td>
                <td>{{ $shipment->TrackingNumber }}</td>
                <td>{{ $shipment->ShippingAddress }}</td>
                <td>{{ $shipment->ShippingCost }}</td>
                <td>{{ $shipment->Status }}</td>

                <!--  -->
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
