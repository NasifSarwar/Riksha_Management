<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AdminApprovalController extends Controller
{
    public function showPendingPullers()
{
    $pendingPullers = User::where('role', 'puller')->where('is_approved', null)->get();
    return view('admin.approve-pullers', compact('pendingPullers'));
}

public function approve($id)
{
    $user = User::findOrFail($id);
    $user->is_approved = true;
    $user->save();

    return redirect()->back()->with('success', 'Puller approved successfully.');
}

public function disapprove($id)
{
        // Set is_approved to 0 (Disapproved)
        $user = User::findOrFail($id);
        $user->is_approved = 0;  // Set to 0 instead of null
        $user->save();

        return redirect()->back()->with('info', 'Puller disapproved successfully.');
}
}
