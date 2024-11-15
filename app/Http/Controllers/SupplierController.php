<?php

namespace App\Http\Controllers;

use App\Exports\BankCategoryExport;
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

    public function edit($id)
    {
        $bank = Supplier::findOrFail($id);
        return view('Supplier.edit_supplier', compact('bank'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string',
            'company' => 'required|string|max:255',
            'address' => 'required|string',
            'contact_person' => 'required|string|max:255',
            'phone_no' => 'required|numeric',
            'email' => 'required|email|max:255',
            'tin_no' => 'required|numeric',
            'product_type' => 'required|string',
        ]);

        $bank = Supplier::findOrFail($id);
        $bank->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'company' => $request->input('company'),
            'address' => $request->input('address'),
            'contact_person' => $request->input('contact_person'),
            'phone_no' => $request->input('phone_no'),
            'email' => $request->input('email'),
            'tin_no' => $request->input('tin_no'),
            'product_type' => $request->input('product_type'),
        ]);

        return redirect()->route('supplier.index')->with('success', 'Supplier updated successfully.');
    }

    public function destroy($id)
    {
        $bank = Supplier::findOrFail($id);
        $bank->delete();

        return redirect()->route('supplier.index')->with('success', 'Supplier deleted successfully.');
    }

    // Add this method to your controller
    public function exportToExcel()
    {
        return Excel::download(new BankCategoryExport, 'supplier.xlsx');
    }
    
}