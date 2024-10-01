<?php

namespace App\Http\Controllers;

use App\Exports\BankCategoryExport;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search'); // Get the search term
        $perPage = $request->input('perPage', 10); // Get the number of items per page, default to 10

        // Query the banks with search and pagination
         $product = ProductCategory::when($search, function ($query) use ($search) {
            return $query->where('bank_name', 'like', '%' . $search . '%')
                        ->orWhere('description', 'like', '%' . $search . '%');
        })->paginate($perPage);
        return view('Category.display_product', compact('product'));
   }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Category.product'); // Make sure the view exists

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

        // Create a new product stock entry using the ProductCategory model
        ProductCategory::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            
        ]);

        // Redirect or return response
        return redirect()->route('product.category.index')->with('success', 'Product category added successfully.');
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
    public function edit($id)
    {
        $bank = ProductCategory::findOrFail($id);
        return view('Category.edit_product', compact('bank'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $bank = ProductCategory::findOrFail($id);
        $bank->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('product.category.index')->with('success', 'Product Category Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bank = ProductCategory::findOrFail($id);
        $bank->delete();

        return redirect()->route('product.category.index')->with('success', 'Product Category Category deleted successfully.');
    }

    // Add this method to your controller
    public function exportToExcel()
    {
        return Excel::download(new BankCategoryExport, 'product_categories.xlsx');
    }
}
