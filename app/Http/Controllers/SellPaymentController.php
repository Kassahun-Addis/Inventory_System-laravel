<?php

namespace App\Http\Controllers;

use App\Exports\BankCategoryExport;
use Illuminate\Http\Request;

class SellPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $search = $request->input('search'); // Get the search term
        // $perPage = $request->input('perPage', 10); // Get the number of items per page, default to 10
    
        // // Query the banks with search and pagination
        // $banks = Bank::when($search, function ($query) use ($search) {
        //     return $query->where('bank_name', 'like', '%' . $search . '%')
        //                  ->orWhere('description', 'like', '%' . $search . '%');
        // })->paginate($perPage);
    
        // return view('Category.display_bank', compact('banks', 'search', 'perPage'));
   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Sell_Payment.sell_payment');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // \Log::info($request->all());

        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'description' => 'required|string',
        // ]);

        // Bank::create([
        //     'bank_name' => $request->input('name'),
        //     'description' => $request->input('description'),
        // ]);

        // return redirect()->route('bank.category.create')->with('success', 'Product stock added successfully.');
   
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $bank = Bank::findOrFail($id);
        // return view('Category.edit_bank', compact('bank'));
   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'description' => 'required|string',
        // ]);

        // $bank = Bank::findOrFail($id);
        // $bank->update([
        //     'bank_name' => $request->input('name'),
        //     'description' => $request->input('description'),
        // ]);

        // return redirect()->route('bank.category.index')->with('success', 'Bank updated successfully.');
   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $bank = Bank::findOrFail($id);
        // $bank->delete();

        // return redirect()->route('bank.category.index')->with('success', 'Bank deleted successfully.');
    }
    // Add this method to your controller
    public function exportToExcel()
    {
        return Excel::download(new BankCategoryExport, 'sell_payment.xlsx');
    }
}
