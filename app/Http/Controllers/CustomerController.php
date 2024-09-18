<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // Display the list of customers
    public function index()
    {
        $customers = Customer::all();
        return view('customer.index', compact('customers'));
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
}



