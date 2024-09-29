<?php

namespace App\Http\Controllers;

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
            'Assigned_person' => 'nullable|string|max:50',
            'Carrier' => 'nullable|string',
            'ShipmentDate' => 'required|date',
            'TrackingNumber' => 'nullable|string',
            'ShippingAddress' => 'nullable|string|max:50',
            'ShippingCost' => 'required|integer',
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
    
}

