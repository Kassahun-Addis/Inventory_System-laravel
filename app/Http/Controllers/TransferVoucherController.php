<?php

namespace App\Http\Controllers;

use App\Exports\BankCategoryExport;
use App\Models\Shipment; // Import the expense model
use Illuminate\Http\Request;

class TransferVoucherController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search'); // Get the search term
        $perPage = $request->input('perPage', 10); // Get the number of items per page, default to 10

        // Query the banks with search and pagination
         $shipments = Shipment::when($search, function ($query) use ($search) {
            return $query->where('bank_name', 'like', '%' . $search . '%')
                        ->orWhere('description', 'like', '%' . $search . '%');
        })->paginate($perPage);
        return view('Transfer_Voucher.index', compact('shipments'));
   }

    public function create()
    {
        return view('Transfer_Voucher.transfer_voucher'); // Returns the product_stock.blade.php view
    }

    public function store(Request $request)
    {
        // Log the incoming request data
        \Log::info('Storing shipments data:', $request->all());
    
        // Validate the incoming request data
        $request->validate([
            'Assigned_Person' => 'nullable|string|max:50',
            'Carrier' => 'nullable|string',
            'Shipment_Date' => 'required|date',
            'Tracking_Number' => 'nullable|string',
            'Shipping_Address' => 'nullable|string|max:50',
            'Shipping_Cost' => 'required|integer',
            'Status' => 'nullable|string',
        ]);

        // Create a new expense
        //$expense = expense::create($request->all());
        $shipments = Shipment::create($request->except('_token'));

    
        // Log the newly created expense
        \Log::info('New shipments created:', $shipments->toArray());
    
        // Redirect to the index page with a success message
        return redirect()->route('shipments.index')->with('success', 'shipments added successfully.');
    }

    public function edit($id)
    {
        $bank = Shipment::findOrFail($id);
        return view('Transfer_Voucher.edit_shipment', compact('bank'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Assigned_Person' => 'nullable|string|max:50',
            'Carrier' => 'nullable|string',
            'Shipment_Date' => 'required|date',
            'Tracking_Number' => 'nullable|string',
            'Shipping_Address' => 'nullable|string|max:50',
            'Shipping_Cost' => 'required|integer',
            'Status' => 'nullable|string',
        ]);

        $bank = Shipment::findOrFail($id);
        $bank->update([
            'Assigned_person' => $request->input('Assigned_Person'),
            'Carrier' => $request->input('Carrier'),
            'ShipmentDate' => $request->input('Shipment_Date'),
            'TrackingNumber' => $request->input('Tracking_Number'),
            'ShippingAddress' => $request->input('Shipping_Address'),
            'ShippingCost' => $request->input('Shipping_Cost'),
            'Status' => $request->input('Status'),
        ]);

        return redirect()->route('transfer.voucher.index')->with('success', 'Shipment updated successfully.');
    }

        public function destroy($id)
        {
            $bank = Shipment::findOrFail($id);
            $bank->delete();

            return redirect()->route('transfer.voucher.index')->with('success', 'Shipment deleted successfully.');
        }


        // Add this method to your controller
        public function exportToExcel()
        {
            return Excel::download(new BankCategoryExport, 'shipment.xlsx');
        }
    
}

