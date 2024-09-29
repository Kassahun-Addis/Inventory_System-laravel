<?php

namespace App\Http\Controllers;

use App\Models\Supplier; // Import the Supplier model
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    
    public function index(Request $request)
    {
        $search = $request->input('search'); // Get the search term
        $perPage = $request->input('perPage', 10); // Get the number of items per page, default to 10

        // Query the banks with search and pagination
         $suppliers = Supplier::when($search, function ($query) use ($search) {
            return $query->where('bank_name', 'like', '%' . $search . '%')
                        ->orWhere('description', 'like', '%' . $search . '%');
        })->paginate($perPage);
        return view('Supplier.index', compact('suppliers'));
   }
   
    public function create()
    {
        return view('Supplier.supplier'); // Returns the supplier creation view
    }

    public function store(Request $request)
    {
        // Log the incoming request data
        \Log::info('Storing supplier data:', $request->all());
    
        // Validate the incoming request data
        $request->validate([
            'first_name' => 'nullable|string|max:100',
            'last_name' => 'nullable|string|max:100',
            'company' => 'nullable|string|max:100',
            'address' => 'nullable|string',
            'contact_person' => 'required|string|max:255',
            'phone_no' => 'required|string|max:20',
            'email' => 'required|string|email|max:50',
            'tin_no' => 'required|integer',
            'product_type' => 'required|string|max:50',
        ]);
    
        // Create a new supplier
        //$supplier = Supplier::create($request->all());
        $supplier = Supplier::create($request->except('_token'));

    
        // Log the newly created supplier
        \Log::info('New supplier created:', $supplier->toArray());
    
        // Redirect to the index page with a success message
        return redirect()->route('supplier.index')->with('success', 'Supplier added successfully.');
    }
    
}