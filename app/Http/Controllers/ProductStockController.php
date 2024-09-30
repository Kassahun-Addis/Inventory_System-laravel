<?php

namespace App\Http\Controllers;

use App\Exports\BankCategoryExport;
use App\Models\ProductStock; // Ensure this line is present
use Illuminate\Http\Request;

class ProductStockController extends Controller
{
    
   
public function index(Request $request)
    {
        $search = $request->input('search'); // Get the search term
        $perPage = $request->input('perPage', 10); // Get the number of items per page, default to 10

        // Query the banks with search and pagination
         $stocks = ProductStock::when($search, function ($query) use ($search) {
            return $query->where('bank_name', 'like', '%' . $search . '%')
                        ->orWhere('description', 'like', '%' . $search . '%');
        })->paginate($perPage);
        return view('product_stock.index', compact('stocks'));
   }

    public function create()
    {
        return view('Product_Stock.product_stock'); // Make sure the view exists
    }
    
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
        return redirect()->route('product.stock.index')->with('success', 'Product stock added successfully.');
    }
    // Add this method to your controller
    public function exportToExcel()
    {
        return Excel::download(new BankCategoryExport, 'product_stock.xlsx');
    }
}
