<?php


namespace App\Http\Controllers;

use App\Exports\BankCategoryExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search'); // Get the search term
        $perPage = $request->input('perPage', 10); // Get the number of items per page, default to 10

        // Query the banks with search and pagination
        $banks = Bank::when($search, function ($query) use ($search) {
            return $query->where('bank_name', 'like', '%' . $search . '%')
                        ->orWhere('description', 'like', '%' . $search . '%');
        })->paginate($perPage);

        return view('Category.display_bank', compact('banks', 'search', 'perPage'));
    }

    public function create()
    {
        return view('Category.bank');
    }

    public function store(Request $request)
    {
        \Log::info($request->all());

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Bank::create([
            'bank_name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('bank.category.create')->with('success', 'Product stock added successfully.');
    }

    public function edit($id)
    {
        $bank = Bank::findOrFail($id);
        return view('Category.edit_bank', compact('bank'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $bank = Bank::findOrFail($id);
        $bank->update([
            'bank_name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('bank.category.index')->with('success', 'Bank updated successfully.');
    }

    public function destroy($id)
    {
        $bank = Bank::findOrFail($id);
        $bank->delete();

        return redirect()->route('bank.category.index')->with('success', 'Bank deleted successfully.');
    }

    // Add this method to your controller
    public function exportToExcel()
    {
        return Excel::download(new BankCategoryExport, 'bank_categories.xlsx');
    }
}
