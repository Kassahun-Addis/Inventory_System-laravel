<?php

namespace App\Http\Controllers;

use App\Models\ProductStock; // Ensure this line is present
use Illuminate\Http\Request;

class ProductStockController extends Controller
{
    public function store(Request $request)
    {
        \Log::info($request->all()); // Log all incoming data

        // Validate the incoming request data
        $request->validate([
            'product_name' => 'required|string|max:255',
            'category' => 'required|string',
            'quantity' => 'required|integer',
            'production_cost' => 'nullable|numeric',
            'selling_price' => 'required|numeric',
            'alert_quantity' => 'required|integer',
            'details_specification' => 'nullable|string',
        ]);

        // Create a new product stock entry using the ProductStock model
        ProductStock::create([
            'product_name' => $request->input('product_name'),
            'category' => $request->input('category'),
            'quantity' => $request->input('quantity'),
            'production_cost' => $request->input('production_cost'),
            'selling_price' => $request->input('selling_price'),
            'alert_quantity' => $request->input('alert_quantity'),
            'details_specification' => $request->input('details_specification'),
        ]);

        // Redirect or return response
        return redirect()->route('product.stock.create')->with('success', 'Product stock added successfully.');
    }
}