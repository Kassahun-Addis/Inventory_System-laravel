<?php

namespace App\Http\Controllers;

use App\Models\Location; // Import the expense model
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::all();
        return view('Sells_Location.index', compact('locations'));
    }

    public function create()
    {
        return view('Sells_Location.location'); // Returns the product_stock.blade.php view
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
    
}
