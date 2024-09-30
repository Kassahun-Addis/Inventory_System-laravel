<?php

namespace App\Http\Controllers;

use App\Exports\BankCategoryExport;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // Display the list of customers
    public function index(Request $request)
    {
        $search = $request->input('search'); // Get the search term
        $perPage = $request->input('perPage', 10); // Get the number of items per page, default to 10

        // Query the banks with search and pagination
         $customers = Customer::when($search, function ($query) use ($search) {
            return $query->where('bank_name', 'like', '%' . $search . '%')
                        ->orWhere('description', 'like', '%' . $search . '%');
        })->paginate($perPage);
        return view('Customer.index', compact('customers'));
   }

    // Show the form for adding a new customer
    public function create()
    {
        return view('Customer.customer');
    }

    // Store the customer in the database
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:100',
            'company' => 'nullable|string|max:100',
            'address' => 'nullable|string|max:100',
            'phone_no' => 'required|numeric',
            'email' => 'nullable|email|max:100',
            'tin_no' => 'required|numeric',
        ]);

        // Create a new customer
        Customer::create($request->all());

        return redirect()->route('customerss.index')->with('success', 'Customer added successfully.');
    }
    // Add this method to your controller
    public function exportToExcel()
    {
        return Excel::download(new BankCategoryExport, 'customers.xlsx');
    }
}



