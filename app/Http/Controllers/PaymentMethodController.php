<?php

namespace App\Http\Controllers;

use App\Exports\BankCategoryExport;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search'); // Get the search term
        $perPage = $request->input('perPage', 10); // Get the number of items per page, default to 10
    
        // Query the banks with search and pagination
        $banks = PaymentMethod::when($search, function ($query) use ($search) {
            return $query->where('name', 'like', '%' . $search . '%');
        })->paginate($perPage);
    
        return view('Category.display_payMethod', compact('banks', 'search', 'perPage'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Category.payment_method');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        \Log::info($request->all());

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        PaymentMethod::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('payment-method.category.create')->with('success', 'Payment Method added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PaymentMethod $paymentMethod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $bank = PaymentMethod::findOrFail($id);
        return view('Category.edit_payMethod', compact('bank'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $bank = PaymentMethod::findOrFail($id);
        $bank->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('payment-method.category.index')->with('success', 'Payment Method updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bank = PaymentMethod::findOrFail($id);
        $bank->delete();

        return redirect()->route('payment-method.category.index')->with('success', 'Payment Method deleted successfully.');
    }
    // Add this method to your controller
    public function exportToExcel()
    {
        return Excel::download(new BankCategoryExport, 'payment_method.xlsx');
    }
}
