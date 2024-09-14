<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function create()
    {
        return view('assets.asset');
    }

    public function store(Request $request)
    {
        // Validate and store the asset
        $request->validate([
            'asset_name' => 'required',
            'category' => 'required',
            'purchase_price' => 'required|numeric',
            'status' => 'required',
            // add other validations as needed
        ]);

        // Logic to save the asset (e.g., Asset::create([...]));
        
        return redirect()->route('assets.create')->with('success', 'Asset added successfully!');
    }
}