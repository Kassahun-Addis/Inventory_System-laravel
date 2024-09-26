<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch and display product Bank
        $banks = Bank::all();
        return view('Category.display_bank', compact('banks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Category.bank'); // Make sure the view exists

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        \Log::info($request->all()); // Log all incoming data

        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
           
        ]);

        // Create a new product stock entry using the Bank model
        Bank::create([
            'bank_name' => $request->input('name'),
            'description' => $request->input('description'),
            
        ]);

        // Redirect or return response
        return redirect()->route('expense.category.index')->with('success', 'Product stock added successfully.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductCategory $productCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductCategory $productCategory)
    {
        //
    }
}
