<?php

namespace App\Http\Controllers;

use App\Exports\BankCategoryExport;
use App\Models\Specification;
use Illuminate\Http\Request;

class SpecificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index(Request $request)
    {
        $search = $request->input('search'); // Get the search term
        $perPage = $request->input('perPage', 10); // Get the number of items per page, default to 10

        // Query the banks with search and pagination
         $specifications = Specification::when($search, function ($query) use ($search) {
            return $query->where('description', 'like', '%' . $search . '%');
        })->paginate($perPage);
        return view('Category.display_specification', compact('specifications'));
   }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Category.specification'); // Make sure the view exists

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        \Log::info($request->all()); // Log all incoming data

        // Validate the incoming request data
        $request->validate([
            'description' => 'required|string|max:255',
           
        ]);

        // Create a new product stock entry using the Specification model
        Specification::create([
            'description' => $request->input('description'),
            
        ]);

        // Redirect or return response
        return redirect()->route('specification.category.index')->with('success', 'Product stock added successfully.');
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
        $bank = Specification::findOrFail($id);
        return view('Category.edit_specification', compact('bank'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required|string',
        ]);

        $bank = Specification::findOrFail($id);
        $bank->update([
            'description' => $request->input('description'),
        ]);

        return redirect()->route('specification.category.index')->with('success', 'Specification Category Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bank = Specification::findOrFail($id);
        $bank->delete();

        return redirect()->route('specification.category.index')->with('success', 'Specification Category Category deleted successfully.');
    }

    // Add this method to your controller
    public function exportToExcel()
    {
        return Excel::download(new BankCategoryExport, 'specification.xlsx');
    }
}
