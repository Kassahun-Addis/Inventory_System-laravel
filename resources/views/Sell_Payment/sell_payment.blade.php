@extends('layouts.app')

@section('title', 'Sell Payment - Add New')

@section('content')
<div class="container mt-5">
    <h2>Add New Sell Payment</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <div class="form-section">
        <form action="{{ route('bank.category.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Order_Id" class="required">Order Id</label>
                        <input type="number" class="form-control" id="Order_Id" name="Order_Id" required>
                    </div>

                    <div class="form-group">
                        <label for="Customer_Name" class="required">Customer Name</label>
                        <input type="text" class="form-control" id="Customer_Name" name="Customer_Name" required>
                    </div>

                    <div class="form-group">
                        <label for="Seller_Name" class="required">Seller Name</label>
                        <input type="text" class="form-control" id="Seller_Name" name="Seller_Name" required>
                    </div>

                    <div class="form-group">
                        <label for="Sells_Location" class="required">Sells Location</label>
                        <input type="text" class="form-control" id="Sells_Location" name="Sells_Location" required>
                    </div>

                    <div class="form-group">
                        <label for="Product_Name" class="required">Product Name</label>
                        <input type="text" class="form-control" id="Product_Name" name="Product_Name" required>
                    </div>

                    <div class="form-group">
                        <label for="Deposit_Amount" class="required">Deposit Amount</label>
                        <input type="number" class="form-control" id="Deposit_Amount" name="Deposit_Amount" required>
                    </div>
                
                    <div class="form-group">
                        <label for="Due_Amount" class="required">Due Amount</label>
                        <input type="number" class="form-control" id="Due_Amount" name="Due_Amount" required>
                    </div>

                    <div class="form-group">
                        <label for="Payment_Method" class="required">Payment Method</label>
                        <input type="text" class="form-control" id="Payment_Method" name="Payment_Method" required>
                    </div>

                    <div class="form-group">
                        <label for="Bank_Name" class="required">Bank Name</label>
                        <input type="text" class="form-control" id="Bank_Name" name="Bank_Name" required>
                    </div>

                    <div class="form-group">
                        <label for="Payment_Date" class="required">Payment Date</label>
                        <input type="date" class="form-control" id="Payment_Date" name="Payment_Date" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Transaction_No" class="required">Transaction No</label>
                        <input type="text" class="form-control" id="Transaction_No" name="Transaction_No" required>
                    </div>

                    <div class="form-group">
                        <label for="Fs_Number" class="required">FS Number</label>
                        <input type="number" class="form-control" id="Fs_Number" name="Fs_Number" required>
                    </div>

                    <div class="form-group">
                        <label for="Withholding_Voucher_No" class="required">Withholding Voucher No</label>
                        <input type="text" class="form-control" id="Withholding_Voucher_No" name="Withholding_Voucher_No" required>
                    </div>

                    <div class="form-group">
                        <label for="Sub_Total" class="required">Sub Total</label>
                        <input type="number" class="form-control" id="Sub_Total" name="Sub_Total" required>
                    </div>

                    <div class="form-group">
                        <label for="Withhold" class="required">Withhold</label>
                        <input type="number" class="form-control" id="Withhold" name="Withhold" required>
                    </div>

                    <div class="form-group">
                        <label for="Discount" class="required">Discount</label>
                        <input type="number" class="form-control" id="Discount" name="Discount" required>
                    </div>

                    <div class="form-group">
                        <label for="Vat" class="required">Vat</label>
                        <input type="number" class="form-control" id="Vat" name="Vat" required>
                    </div>

                    <div class="form-group">
                        <label for="Total_Price" class="required">Total Price</label>
                        <input type="number" class="form-control" id="Total_Price" name="Total_Price" required>
                    </div>													                   
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-custom">Save</button>
                <button type="reset" class="btn btn-secondary btn-custom">Reset</button>
                <a href="{{ route('bank.category.index') }}" class="btn btn-secondary btn-custom">Back to list</a> <!-- Updated Back to list button -->
            </div>
        </form>
    </div>
</div>
@endsection