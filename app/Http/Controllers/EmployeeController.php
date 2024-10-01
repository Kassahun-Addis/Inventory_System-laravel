<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Exports\BankCategoryExport;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search'); // Get the search term
        $perPage = $request->input('perPage', 10); // Get the number of items per page, default to 10

        // Query the banks with search and pagination
         $suppliers = Employee::when($search, function ($query) use ($search) {
            return $query->where('bank_name', 'like', '%' . $search . '%')
                        ->orWhere('description', 'like', '%' . $search . '%');
        })->paginate($perPage);
        return view('Employee.index', compact('suppliers'));
   }

    //
    public function create()
    {
        return view('Employee.employee'); // Returns the product_stock.blade.php view
    }

    public function store(Request $request)
    {
        // Log the incoming request data
        \Log::info('Storing Employee data:', $request->all());
    
        // Validate the incoming request data
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string',
            'phone_no' => 'required|numeric',
            'email' => 'required|email',
            'contactinfo' => 'required|string',
            'position' => 'required|string',
            'department' => 'required|string',
            'HireDate' => 'required|date',
        ]);

    
        // Create a new expense
        //$expense = expense::create($request->all());
        $expense = Employee::create($request->except('_token'));

    
        // Log the newly created expense
        \Log::info('New Employee created:', $expense->toArray());
    
        // Redirect to the index page with a success message
        return redirect()->route('employee.index')->with('success', 'Employee added successfully.');
    }

    public function edit($id)
    {
        $bank = Expense::findOrFail($id);
        return view('Employee.edit_employee', compact('bank'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string',
            'phone_no' => 'required|numeric',
            'email' => 'required|email',
            'contactinfo' => 'required|string',
            'position' => 'required|string',
            'department' => 'required|string',
            'HireDate' => 'required|date',
        ]);

        $bank = Employee::findOrFail($id);
        $bank->update([
            'FirstName' => $request->input('first_name'),
            'LasttName' => $request->input('last_name'),
            'phone_no' => $request->input('phone_no'),
            'email' => $request->input('email'),
            'ContactInfo' => $request->input('contactinfo'),
            'Position' => $request->input('position'),
            'Department' => $request->input('department'),
            'HireDate' => $request->input('HireDate'),
        ]);

        return redirect()->route('employee.index')->with('success', 'Employee updated successfully.');
    }

    public function destroy($id)
    {
        $bank = Employee::findOrFail($id);
        $bank->delete();

        return redirect()->route('employee.index')->with('success', 'Employee deleted successfully.');
    }

    // Add this method to your controller
    public function exportToExcel()
    {
        return Excel::download(new BankCategoryExport, 'employees.xlsx');
    }
}
