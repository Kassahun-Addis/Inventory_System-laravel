<?php

namespace App\Http\Controllers;

use App\Models\AssetModel;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function index()
    {
        // Display a list of assets
        $assets = AssetModel::all();
        return view('assets.index', compact('assets')); // Adjust path if necessary
    }

    public function create()
    {
        return view('assets.asset'); // The path to your form view
    }

    public function store(Request $request)
{
    // Log the incoming request data
    \Log::info('Storing asset data:', $request->all());

    // Validate the incoming request data
    $request->validate([
        'asset_name' => 'required|string|max:255',
        'category' => 'required|string',
        'purchase_price' => 'required|numeric',
        'status' => 'required|string',
        'serial_no' => 'nullable|string',
        'description' => 'nullable|string',
        'assigned_to' => 'nullable|string',
        'department' => 'required|string',
        'purchase_date' => 'required|date',
        'last_maintenance_date' => 'nullable|date',
        'remark' => 'nullable|string',
    ]);

    // Create a new asset entry using the AssetModel
    $asset = AssetModel::create([
        'asset_name' => $request->input('asset_name'),
        'category' => $request->input('category'),
        'purchase_price' => $request->input('purchase_price'),
        'status' => $request->input('status'),
        'serial_no' => $request->input('serial_no'),
        'description' => $request->input('description'),
        'assigned_to' => $request->input('assigned_to'),
        'department' => $request->input('department'),
        'purchase_date' => $request->input('purchase_date'),
        'last_maintenance_date' => $request->input('last_maintenance_date'),
        'remark' => $request->input('remark'),
    ]);

    // Log the newly created asset
    \Log::info('New asset created:', $asset->toArray());

    // Redirect or return response
    return redirect()->route('assets.index')->with('success', 'Asset added successfully.');
}

}
