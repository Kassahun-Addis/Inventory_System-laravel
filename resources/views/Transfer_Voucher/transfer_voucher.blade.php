@extends('layouts.app')

@section('title', 'Shipment - Add New')

@section('content')
    <header class="header" style="background-color: #4caf50;">
        <h2>Shipment, Add New</h2>
    </header>

        <div class="form-section mt-4">
            <h3>Shipment Information</h3>
            <form action="#" method="POST">
                @csrf
                <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                    <label for="Assigned_Person" class="required">Assigned Person</label>
                    <input type="text" class="form-control" id="Assigned_Person" name="Assigned_Person" required>
                </div>

                <div class="form-group">
                    <label for="Carrier" class="required">Carrier</label>
                    <input type="text" class="form-control" id="Carrier" name="Carrier" required>
                </div>

                <div class="form-group">
                    <label for="Shipment_Date">Shipment Date</label>
                    <input type="date" class="form-control" id="Shipment_Date" name="Shipment_Date" required>
                </div>
            </div>

                <div class="col-md-6">
                <div class="form-group">
                    <label for="Tracking_Number" class="required">Tracking Number</label>
                    <input type="text" class="form-control" id="Tracking_Number" name="Tracking_Number" required>
                </div>

                <div class="form-group">
                    <label for="Shipping_Address" class="required">Shipping Address</label>
                    <input type="text" class="form-control" id="Shipping_Address" name="Shipping_Address" required>
                </div>

                <div class="form-group">
                    <label for="Shipping_Cost" class="required">Shipping Cost</label>
                    <input type="number" class="form-control" id="Shipping_Cost" name="Shipping_Cost" required>
                </div>

                <div class="form-group">
                    <label for="Status" class="required">Status</label>
                    <input type="text" class="form-control" id="Status" name="Status" required>
                </div>
            </div>
        </div> 
                <div class="flex space-x-2">
                    <button type="submit" class="btn-primary">Save</button>
                    <button type="reset" class="btn-secondary">Reset</button>
                    <a href="{{ route('transfer.voucher.index') }}" class="btn btn-secondary btn-custom">Back to list</a> <!-- Updated Back to list button -->
                </div>
        </form>
    </div>
    
@endsection
</html>