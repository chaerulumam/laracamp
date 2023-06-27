<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth'])->group(function () {

    Route::get('checkout/{camp:slug}/create', [CheckoutController::class, 'create'])->name('checkout.create');
    Route::get('checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
    Route::post('checkout/{camp}', [CheckoutController::class, 'store'])->name('checkout.store');

    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('user.dashboard');
    // Route::get('dashboard/checkout/invoice/{checkout}', [CheckoutController::class, 'invoice'])->name('user.checkout.invoice');

});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
