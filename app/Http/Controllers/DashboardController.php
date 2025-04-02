<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // public function ownerDashboard()
    // {
    //     return view('dashboard.owner');
    // }

    // public function adminDashboard()
    // {
    //     return view('dashboard.admin');
    // }

    // public function pullerDashboard()
    // {
    //     return view('dashboard.puller');
    // }
    public function ownerDashboard()
{
    $user = Auth::user(); // Get the logged-in user
    return view('dashboard.owner', compact('user'));
}

public function adminDashboard()
{
    $user = Auth::user();
    return view('dashboard.admin', compact('user'));
}

public function pullerDashboard()
{
    $user = Auth::user();
    return view('dashboard.puller', compact('user'));
}
}
