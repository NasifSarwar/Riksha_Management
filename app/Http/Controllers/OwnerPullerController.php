<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OwnerPullerController extends Controller
{
    // Show the puller registration form
    public function create()
    {
        $ownerId = Auth::id();
    
        // Get all pullers created by this owner (approved, disapproved, and pending)
        $allPullers = User::where('registered_by', $ownerId)
                          ->where('role', 'puller')
                          ->get();
    
        return view('owner.register-puller', compact('allPullers'));
    }

    // Handle the submission of the puller registration form
    public function store(Request $request)
    {
        $request->merge(['role' => 'puller']);
        $userId = Auth::id();

        if (!$userId) {
            // Handle the case where the user is not logged in
            return redirect()->route('login');
        }
        // Validate the request
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        'phone_number' => ['required', 'string'],  // Validation for phone number
        'nid_number' => ['required', 'string'],  // Validation for NID number
        'division' => ['required', 'string'],  // Validation for division
        'district' => ['required', 'string'],  // Validation for district
        'full_address' => ['required', 'string'],  // Validation for full address
        'role' => ['required', 'in:puller'],  // Validation for role (always puller)
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);

    // Create a new user with the provided data
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone_number' => $request->phone_number,  // Store phone number
        'nid_number' => $request->nid_number,  // Store NID number
        'division' => $request->division,  // Store division
        'district' => $request->district,  // Store district
        'full_address' => $request->full_address,  // Store full address
        'role' => $request->role,  // Always set the role to puller
        'password' => Hash::make($request->password),  // Hash and store the password
        'is_approved' => null, // Set to false because it's waiting for admin approval
        'registered_by' => $userId, // No admin registering, so null
    ]);
        return redirect()->back()->with('success', 'Puller registration request sent to admin for approval.');
    }
}
