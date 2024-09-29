<?php

namespace App\Http\Controllers;

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
    
}