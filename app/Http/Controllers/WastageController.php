<?php

namespace App\Http\Controllers;

use App\Exports\BankCategoryExport;
use App\Models\Wastage; // Import the expense model
use Illuminate\Http\Request;

class WastageController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search'); // Get the search term
        $perPage = $request->input('perPage', 10); // Get the number of items per page, default to 10

        // Query the banks with search and pagination
         $wastages = Wastage::when($search, function ($query) use ($search) {
            return $query->where('bank_name', 'like', '%' . $search . '%')
                        ->orWhere('description', 'like', '%' . $search . '%');
        })->paginate($perPage);
        return view('Wastage.index', compact('wastages'));
   }
   
    public function create()
    {
        return view('Wastage.wastage'); // Returns the expense creation view
    }

    public function store(Request $request)
    {
        // Log the incoming request data
        \Log::info('Storing wasetage data:', $request->all());
    
        // Validate the incoming request data
        $request->validate([
            'Product_name' => 'nullable|string|max:50',
            'Quantity' => 'required|integer',
            'WastageDate' => 'required|date',
            'Reason' => 'nullable|string',
            'unit' => 'required|string',
        ]);

    
        // Create a new expense
        //$expense = expense::create($request->all());
        $wastages = Wastage::create($request->except('_token'));

    
        // Log the newly created expense
        \Log::info('New wastage created:', $wastages->toArray());
    
        // Redirect to the index page with a success message
        return redirect()->route('wastages.index')->with('success', 'Wastage added successfully.');
    }
    public function edit($id)
    {
        $bank = Wastage::findOrFail($id);
        return view('Wastage.edit_wastage', compact('bank'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'Product_name' => 'required|string|max:255',
            'Quantity' => 'required|numeric',
            'WastageDate' => 'required|date',
            'Reason' => 'required|string',
            'unit' => 'required|string|max:255',
        ]);

        $bank = Wastage::findOrFail($id);
        $bank->update([
            'Product_name' => $request->input('Product_name'),
            'Quantity' => $request->input('Quantity'),
            'WastageDate' => $request->input('WastageDate'),
            'Reason' => $request->input('Reason'),
            'unit' => $request->input('unit'),
        ]);

        return redirect()->route('wastages.index')->with('success', 'Wastage updated successfully.');
    }

    public function destroy($id)
    {
        $bank = Bank::findOrFail($id);
        $bank->delete();

        return redirect()->route('wastages.index')->with('success', 'Wastage deleted successfully.');
    }

    // Add this method to your controller
    public function exportToExcel()
    {
        return Excel::download(new BankCategoryExport, 'wastage.xlsx');
    }
    
}