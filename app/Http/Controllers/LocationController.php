<?php

namespace App\Http\Controllers;

use App\Exports\BankCategoryExport;
use App\Models\Location; // Import the expense model
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search'); // Get the search term
        $perPage = $request->input('perPage', 10); // Get the number of items per page, default to 10

        // Query the banks with search and pagination
         $locations = Location::when($search, function ($query) use ($search) {
            return $query->where('bank_name', 'like', '%' . $search . '%')
                        ->orWhere('description', 'like', '%' . $search . '%');
        })->paginate($perPage);
        return view('Sells_Location.index', compact('locations'));
   }

    public function create()
    {
        return view('Sells_Location.location'); // Returns the locations_stock.blade.php view
    }

        public function store(Request $request)
    {
        // Log the incoming request data
        \Log::info('Storing Location data:', $request->all());

        // Validate the incoming request data
        $request->validate([
            'location_name' => 'required|string|max:50',
            'description' => 'required|string',
        ]);

        // Create a new location
        $locations = Location::create([
            'name' => $request->input('location_name'),  // Use the correct field name
            'description' => $request->input('description'),
        ]);

        // Log the newly created location
        \Log::info('New Location created:', $locations->toArray());

        // Redirect to the index page with a success message
        return redirect()->route('locations.index')->with('success', 'Location added successfully.');
    } 

    public function edit($id)
    {
        $bank = Location::findOrFail($id);
        return view('Sells_Location.edit_location', compact('bank'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $bank = Location::findOrFail($id);
        $bank->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('location.index')->with('success', 'Location updated successfully.');
    }

    public function destroy($id)
    {
        $bank = Location::findOrFail($id);
        $bank->delete();

        return redirect()->route('location.index')->with('success', 'Location deleted successfully.');
    }

    // Add this method to your controller
    public function exportToExcel()
    {
        return Excel::download(new BankCategoryExport, 'locations.xlsx');
    }
    
}
