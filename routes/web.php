<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SupervisorController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('/auth/login');
});

Route::get('/redirects', [HomeController::class,"index"])->name('index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/status', function () {
    return view('status');
})->middleware(['auth', 'verified'])->name('status');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/supervisor/apply', [SupervisorController::class, 'apply']); 
Route::get('/api/user-data', function () {
    return Auth::user(); // Assuming Auth::user() returns the logged-in user object
  });

Route::post('/supervisor/applications/{application}/approve', [SupervisorController::class, 'approveApplication'])->name('supervisor.applications.approve');
Route::post('/supervisor/applications/{application}/reject', [SupervisorController::class, 'rejectApplication'])->name('supervisor.applications.reject');
  

require __DIR__.'/auth.php';
