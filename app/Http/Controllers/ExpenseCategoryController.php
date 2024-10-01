<?php

namespace App\Http\Controllers;

use App\Models\ExpenseCategory;
use Illuminate\Http\Request;

class ExpenseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index(Request $request)
     {
         $search = $request->input('search'); // Get the search term
         $perPage = $request->input('perPage', 10); // Get the number of items per page, default to 10
 
         // Query the banks with search and pagination
          $expenses = ExpenseCategory::when($search, function ($query) use ($search) {
             return $query->where('bank_name', 'like', '%' . $search . '%')
                         ->orWhere('description', 'like', '%' . $search . '%');
         })->paginate($perPage);
         return view('Category.display_expense', compact('expenses'));
     }
       /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Category.expense'); // Make sure the view exists

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

        // Create a new product stock entry using the ExpenseCategory model
        ExpenseCategory::create([
            'name' => $request->input('name'),
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
    public function edit($id)
    {
        $bank = ExpenseCategory::findOrFail($id);
        return view('Category.edit_expense', compact('bank'));
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

        $bank = ExpenseCategory::findOrFail($id);
        $bank->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('expense.category.index')->with('success', 'Expense Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bank = ExpenseCategory::findOrFail($id);
        $bank->delete();

        return redirect()->route('expense.category.index')->with('success', 'Expense Category deleted successfully.');
    }
    
    // Add this method to your controller
    public function exportToExcel()
    {
        return Excel::download(new BankCategoryExport, 'expense_categories.xlsx');
    }
}
