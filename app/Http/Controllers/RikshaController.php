<?php

namespace App\Http\Controllers;

use App\Models\Riksha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RikshaController extends Controller
{
    // Show the registration form
    public function create()
    {
        $ownerId = Auth::id();
    
        // Get all rikshas registered by this owner
        $allRikshas = Riksha::where('buyer_id', $ownerId)->get();
    
        return view('owner.register-riksha', compact('allRikshas'));
    }

    // Handle form submission
    public function store(Request $request)
    {
        $request->validate([
            'division' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'police_station' => 'required|string|max:255',
            'purchase_date' => 'required|date',
        ]);

        Riksha::create([
            'buyer_id' => Auth::id(),
            'division' => $request->division,
            'district' => $request->district,
            'police_station' => $request->police_station,
            'purchase_date' => $request->purchase_date,
            'is_approved' => null, // default: pending
        ]);

        return redirect()->back()->with('success', 'Riksha registration request submitted successfully!');
    }
}
