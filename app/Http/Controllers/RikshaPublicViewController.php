<?php

namespace App\Http\Controllers;

use App\Models\Riksha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RikshaPublicViewController extends Controller
{
    public function show($id)
    {
    $riksha = Riksha::with('puller')->findOrFail($id);
    $user = Auth::user();

    if (!$user) {
        // Not authorized user – show limited info
        return view('public.riksha-guest-view', compact('riksha'));
    }

    // Authorized – show full info
    return view('public.riksha-auth-view', compact('riksha'));
    }
}
