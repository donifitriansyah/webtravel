<?php
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TravelPackageController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;
use  Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/detail', [DetailController::class, 'index'])->name('detail');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout-success');

Route::prefix('admin')
    ->middleware(['auth','admin'])
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        // Route::resource('travel-package', 'TravelPackageController');
        Route::resource('travel-package', TravelPackageController::class);
    });


Auth::routes(['verify' => true]);
