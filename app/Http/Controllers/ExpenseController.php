<?php

namespace App\Http\Controllers;

use App\Exports\BankCategoryExport;
use App\Models\Expense; // Import the expense model
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    
    public function index(Request $request)
    {
        $search = $request->input('search'); // Get the search term
        $perPage = $request->input('perPage', 10); // Get the number of items per page, default to 10

        // Query the banks with search and pagination
         $expenses = Expense::when($search, function ($query) use ($search) {
            return $query->where('bank_name', 'like', '%' . $search . '%')
                        ->orWhere('description', 'like', '%' . $search . '%');
        })->paginate($perPage);
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


    public function edit($id)
    {
        $bank = Expense::findOrFail($id);
        return view('Expense.edit_expense', compact('bank'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'expense_date' => 'required|string|max:255',
            'expense_for' => 'required|string',
            'amount' => 'required|numeric',
            'expense_category' => 'required|numeric',
            'expense_description' => 'required|numeric',
        ]);

        $bank = Expense::findOrFail($id);
        $bank->update([
            'expense_date' => $request->input('expense_date'),
            'category' => $request->input('category'),
            'amount' => $request->input('amount'),
            'expense_category' => $request->input('expense_category'),
            'expense_description' => $request->input('expense_description'),
        ]);

        return redirect()->route('expenses.index')->with('success', 'Expense updated successfully.');
    }

    public function destroy($id)
    {
        $bank = Expense::findOrFail($id);
        $bank->delete();

        return redirect()->route('expenses.index')->with('success', 'Expense deleted successfully.');
    }


    // Add this method to your controller
    public function exportToExcel()
    {
        return Excel::download(new BankCategoryExport, 'expenses.xlsx');
    }
    
}