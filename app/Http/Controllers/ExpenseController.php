<?php

namespace App\Http\Controllers;

use App\Models\Expense; // Import the expense model
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::all();
        return view('Expense.index', compact('expenses'));
    }

    public function create()
    {
        return view('Expense.expense'); // Returns the expense creation view
    }

    public function store(Request $request)
    {
        // Log the incoming request data
        \Log::info('Storing expense data:', $request->all());
    
        // Validate the incoming request data
        $request->validate([
            'expense_date' => 'nullable|date',
            'expense_for' => 'nullable|string|max:100',
            'amount' => 'required|numeric',
            'expense_category' => 'nullable|string',
            'expense_description' => 'required|string|max:255',
        ]);
    
        // Create a new expense
        //$expense = expense::create($request->all());
        $expense = Expense::create($request->except('_token'));

    
        // Log the newly created expense
        \Log::info('New expense created:', $expense->toArray());
    
        // Redirect to the index page with a success message
        return redirect()->route('expenses.index')->with('success', 'Expense added successfully.');
    }
    
}