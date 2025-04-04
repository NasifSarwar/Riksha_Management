<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\RikshaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OwnerPullerController;
use App\Http\Controllers\AdminApprovalController;
use App\Http\Controllers\AdminRikshaApprovalController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/change-language/{lang}', function ($lang) {
//     session(['app_locale' => $lang]);
//     return redirect()->back();
// })->name('changeLang');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', function () {
    $user = Auth::user();

    if (!$user) {
        return redirect('/login');
    }

    return match ($user->role) {
        'owner' => redirect()->route('owner.dashboard'),
        'admin' => redirect()->route('admin.dashboard'),
        'puller' => redirect()->route('puller.dashboard'),
        default => abort(403),
    };
})->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/owner/dashboard', [DashboardController::class, 'ownerDashboard'])
        ->name('owner.dashboard')
        ->middleware('role:owner');

    Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])
        ->name('admin.dashboard')
        ->middleware('role:admin');

    Route::get('/puller/dashboard', [DashboardController::class, 'pullerDashboard'])
        ->name('puller.dashboard')
        ->middleware('role:puller');
});

// owner registering puller 
Route::middleware(['auth', 'owner'])->group(function () {
    Route::get('/owner/register-puller', [OwnerPullerController::class, 'create'])->name('owner.register-puller.create');
    Route::post('/owner/register-puller', [OwnerPullerController::class, 'store'])->name('owner.register-puller.store');
});

// Owner registering riksha
Route::middleware(['auth', 'owner'])->group(function () {
    Route::get('/owner/register-riksha', [RikshaController::class, 'create'])->name('owner.register-riksha.create');
    Route::post('/owner/register-riksha', [RikshaController::class, 'store'])->name('owner.register-riksha.store');
});


// Admin Approving Puller 

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/approve-pullers', [AdminApprovalController::class, 'showPendingPullers'])->name('admin.approve-pullers');
    Route::post('/admin/approve-puller/{id}', [AdminApprovalController::class, 'approve'])->name('admin.approve-puller');
    Route::post('/admin/disapprove-puller/{id}', [AdminApprovalController::class, 'disapprove'])->name('admin.disapprove-puller');
});

// Admin Approve Riksha Routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/approve-rikshas', [AdminRikshaApprovalController::class, 'showPendingRikshas'])->name('admin.approve-rikshas');
    Route::post('/admin/approve-riksha/{id}', [AdminRikshaApprovalController::class, 'approve'])->name('admin.approve-riksha');
    Route::post('/admin/disapprove-riksha/{id}', [AdminRikshaApprovalController::class, 'disapprove'])->name('admin.disapprove-riksha');
});





require __DIR__.'/auth.php';
