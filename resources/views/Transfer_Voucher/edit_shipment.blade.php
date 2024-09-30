@extends('layouts.app')

@section('title', 'Edit Shipment')

@section('content')
<div class="container mt-5">
    <h2>Edit Shipment</h2>

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
        <form action="{{ route('transfer.voucher.update', $bank->ShipmentID) }}" method="POST">
            @csrf
            @method('PUT') <!-- Method spoofing for PUT -->
            <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                    <label for="Assigned_Person" class="required">Assigned Person</label>
                    <input type="text" class="form-control" id="Assigned_Person" name="Assigned_Person" value="{{ old('Assigned_Person', $bank->Assigned_person) }}" required>
                </div>

                <div class="form-group">
                    <label for="Carrier" class="required">Carrier</label>
                    <input type="text" class="form-control" id="Carrier" name="Carrier" value="{{ old('Carrier', $bank->Carrier) }}" required>
                </div>

                <div class="form-group">
                    <label for="Shipment_Date">Shipment Date</label>
                    <input type="date" class="form-control" id="Shipment_Date" name="Shipment_Date" value="{{ old('Shipment_Date', $bank->ShipmentDate) }}" required>
                </div>
            </div>

                <div class="col-md-6">
                <div class="form-group">
                    <label for="Tracking_Number" class="required">Tracking Number</label>
                    <input type="text" class="form-control" id="Tracking_Number" name="Tracking_Number" value="{{ old('Tracking_Number', $bank->TrackingNumber) }}" required>
                </div>

                <div class="form-group">
                    <label for="Shipping_Address" class="required">Shipping Address</label>
                    <input type="text" class="form-control" id="Shipping_Address" name="Shipping_Address" value="{{ old('Shipping_Address', $bank->ShippingAddress) }}" required>
                </div>

                <div class="form-group">
                    <label for="Shipping_Cost" class="required">Shipping Cost</label>
                    <input type="number" class="form-control" id="Shipping_Cost" name="Shipping_Cost" value="{{ old('Shipping_Cost', $bank->ShippingCost) }}" required>
                </div>
                <div class="form-group">
                    <label for="Status" class="required">Status</label>
                    <input type="text" class="form-control" id="Status" name="Status" value="{{ old('Status', $bank->Status) }}" required>
                </div>
            </div>
        </div>               



            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-custom">Update</button>
                <a href="{{ route('transfer.voucher.index') }}" class="btn btn-secondary btn-custom">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
