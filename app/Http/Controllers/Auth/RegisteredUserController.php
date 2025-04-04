<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate incoming registration data
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'phone_number' => ['required', 'string'],  // Validation for phone number
            'nid_number' => ['required', 'string'],  // Validation for NID number
            'division' => ['required', 'string'],  // Validation for division
            'district' => ['required', 'string'],  // Validation for district
            'full_address' => ['required', 'string'],  // Validation for full address
            'role' => ['required', 'in:owner,puller'],  // Validation for role (owner or puller)
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
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
            'role' => $request->role,  // Store role
            'password' => Hash::make($request->password),  // Hash and store the password
            'is_approved' => true, // 👈 APPROVE only for self-registered users
            'registered_by' => null, // 👈 because it's self-registration
        ]);

        // Fire the Registered event
        event(new Registered($user));

        // Log the user in
        Auth::login($user);

        // Redirect the user to the dashboard
        return redirect(route('dashboard', absolute: false));
    }
}
