<?php

namespace App\Http\Controllers;

use App\Models\Riksha;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignRikshaController extends Controller
{
    public function index()
    {
        $ownerId = Auth::id();
    
        // Get unassigned rikshas (where puller_id is null)
        $unassignedRikshas = Riksha::where('buyer_id', $ownerId)->whereNull('puller_id')->get();
    
        // Get assigned rikshas (where puller_id is not null)
        $assignedRikshas = Riksha::where('buyer_id', $ownerId)->whereNotNull('puller_id')->get();
    
        // Get approved pullers only, excluding pullers who are already assigned to a riksha
        $pullers = User::where('role', 'puller')
                    ->where('is_approved', true)
                    ->whereDoesntHave('rikshas') // Exclude users already assigned to a riksha
                    ->get();
    
        return view('owner.manage-rikshas', compact('unassignedRikshas', 'assignedRikshas', 'pullers'));
    }

    public function assignPuller(Riksha $riksha, Request $request)
{
    // Check if the authenticated user is the owner of this riksha
    if ($riksha->buyer_id !== Auth::id()) {
        return redirect()->back()->with('error', 'You are not authorized to assign a puller to this riksha.');
    }

    // Validation to ensure the puller exists
    $puller = User::find($request->puller_id);

    if (!$puller) {
        return redirect()->back()->with('error', 'Puller not found.');
    }

    // Check if the puller is already assigned to another riksha
    $existingRiksha = Riksha::where('puller_id', $puller->id)->first();

    if ($existingRiksha) {
        return redirect()->back()->with('error', 'This puller is already assigned to another riksha.');
    }

    // Now, we can proceed with the assignment, but first, check if this riksha already has a puller
    if (!$riksha->puller_id) {
        $riksha->puller_id = $puller->id;
        $riksha->assigned_at = now();  // Store the current time of assignment
        $riksha->status = 'assigned';  // Update status to 'assigned'
        $riksha->save();

        return redirect()->back()->with('success', 'Puller assigned successfully!');
    }

    return redirect()->back()->with('error', 'This riksha already has a puller assigned.');
}
    public function unassignPuller(Riksha $riksha)
    {
        // Check if the authenticated user is the owner of this riksha
        if ($riksha->buyer_id !== Auth::id()) {
            return redirect()->back()->with('error', 'You are not authorized to unassign a puller from this riksha.');
        }

        // Ensure a puller is currently assigned to the riksha
        if ($riksha->puller_id) {
            $riksha->puller_id = null;  // Remove the puller ID
            $riksha->assigned_at = null; // Remove the assignment time
            $riksha->status = 'inactive';  // Update status to 'inactive'
            $riksha->save();

            return redirect()->back()->with('success', 'Puller unassigned successfully!');
        }

        return redirect()->back()->with('error', 'No puller assigned to unassign.');
    }
}