<?php

use App\Http\Controllers\Admin\CheckoutController as AdminCheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\DashboardController as UserDashboard;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('page.dashboard.homepage');
})->name('home');

Route::get('sign-in-google', [UserController::class, 'google'])->name('signin.google');
Route::get('auth/google/callback', [UserController::class, 'handleCallbackSocialite'])->name('auth.google.callback');

// Midtrans URL
Route::get('payment/success', [CheckoutController::class, 'midtransCallback']);
Route::post('payment/success', [CheckoutController::class, 'midtransCallback']);

Route::middleware(['auth'])->group(function () {

    Route::get('checkout/{camp:slug}/create', [CheckoutController::class, 'create'])->name('checkout.create')->middleware('ensureUserRole:user');
    Route::get('checkout/success', [CheckoutController::class, 'success'])->name('checkout.success')->middleware('ensureUserRole:user');
    Route::post('checkout/{camp}', [CheckoutController::class, 'store'])->name('checkout.store')->middleware('ensureUserRole:user');

    // dashboard
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('user.dashboard');

    // User Dashboard
    Route::prefix('user/dashboard')->namespace('User')->name('user.')->middleware('ensureUserRole:user')->group(function() {
        Route::get('/', [UserDashboard::class, 'index'])->name('dashboard');
    });

    // Admin Dashboard
    Route::prefix('admin/dashboard')->namespace('Admin')->name('admin.')->middleware('ensureUserRole:admin')->group(function() {
        Route::get('/', [AdminDashboard::class, 'index'])->name('dashboard');
        
        Route::post('checkout/{checkout}', [AdminCheckoutController::class, 'update'])->name('checkout.update');
    });

});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
