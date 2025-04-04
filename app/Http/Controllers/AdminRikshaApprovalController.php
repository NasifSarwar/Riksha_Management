<?php

namespace App\Http\Controllers;

use App\Models\Riksha;
use Illuminate\Http\Request;

class AdminRikshaApprovalController extends Controller
{
    public function showPendingRikshas()
    {
        $pendingRikshas = Riksha::with('owner') // <--- this is the change
        ->where('is_approved', null)
        ->get();
        return view('admin.approve-rikshas', compact('pendingRikshas'));
    }

    public function approve($id)
    {
        $riksha = Riksha::findOrFail($id);
        $riksha->is_approved = true;
        $riksha->save();

        return redirect()->back()->with('success', 'Riksha approved successfully.');
    }

    public function disapprove($id)
    {
        $riksha = Riksha::findOrFail($id);
        $riksha->is_approved = 0;
        $riksha->save();

        return redirect()->back()->with('info', 'Riksha disapproved successfully.');
    }
}
