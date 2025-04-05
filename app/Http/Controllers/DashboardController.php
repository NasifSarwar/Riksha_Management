<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Riksha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    protected function calculateDuration($assignedAt)
{
    if ($assignedAt) {
        $now = Carbon::now();
        $duration = $now->diff($assignedAt);
        return $duration->format('%h hours %i minutes');
    }
    return 'N/A';
}
    
    public function ownerDashboard()
{
    $user = Auth::user(); // Get the logged-in user

    $totalRikshas = Riksha::where('buyer_id', $user->id)->count();

    // Unique pullers assigned to this owner's rikshas
    $pullerIds = Riksha::where('buyer_id', $user->id)
                    ->whereNotNull('puller_id')
                    ->pluck('puller_id')
                    ->unique();

    $totalPullers = $pullerIds->count();

    // Rikshas currently online (assigned + have assigned_at timestamp)
    $rikshasOnline = Riksha::where('buyer_id', $user->id)
                        ->whereNotNull('puller_id')
                        ->whereNotNull('assigned_at')
                        ->count();

        // Fetch rikshas currently on road for this owner
        $rikshas = Riksha::where('buyer_id', $user->id)
        ->whereNotNull('puller_id')
        ->whereNotNull('assigned_at')
        ->with('puller') // eager load puller relationship
        ->get();

    // Enhance riksha data with formatted info
    foreach ($rikshas as $riksha) {
        $riksha->puller_name = $riksha->puller ? $riksha->puller->name : 'N/A';
        $riksha->date_online = $riksha->assigned_at ? $riksha->assigned_at->format('Y-m-d') : 'N/A';
        $riksha->time_online = $riksha->assigned_at ? $riksha->assigned_at->format('h:i A') : 'N/A';
        $riksha->duration = $this->calculateDuration($riksha->assigned_at);
    }
    return view('dashboard.owner', compact('user', 'rikshas', 'totalRikshas', 'totalPullers', 'rikshasOnline'));
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
