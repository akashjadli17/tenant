<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AjaxCategoryController;
use App\Http\Controllers\CareerApplicationController;
use App\Http\Controllers\CartController;   
use App\Http\Controllers\AdminController; 
use App\Http\Controllers\DashboardController; 
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\Admin\PackageController; 
use App\Http\Controllers\BlogController;



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //
    Route::post('/booking/confirm', [BookingController::class, 'confirm'])->name('booking.confirm');
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::post('/choose-package/{package}', [DashboardController::class, 'choosePackage'])->name('choose.package');

});

 
Route::prefix('admin')->name('admin.')->group(function () {
    // Property CRUD
    Route::resource('properties', PropertyController::class);

    // Units (handled in PropertyController for form + UnitController only for saving)
    Route::get('/properties/{property}/units/create', [PropertyController::class, 'createUnit'])
        ->name('properties.units.create');
    Route::post('/units/store', [UnitController::class, 'store'])->name('units.store');
});



Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // GET confirm screen
    Route::get('packages/approve/{owner}', [PackageController::class, 'approveConfirm'])
        ->name('packages.approve.confirm');

    // POST approval
    Route::post('packages/approve/{owner}', [PackageController::class, 'approve'])
        ->name('packages.approve');
});



Route::resource('tenants', TenantController::class);


 Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/packages', [IndexController::class, 'packages'])->name('packages');
// Route::view('/', 'home')->name('home'); // Home Page
Route::get('/blog', [IndexController::class, 'blog'])->name('blog');
Route::get('/blog/{slug}', [IndexController::class, 'blogDetails'])->name('blog-details');
Route::view('/contact', 'contact')->name('contact');
Route::view('/wallet', 'wallet')->name('wallet');
Route::view('/card', 'card')->name('card');
Route::view('/login' , 'login')->name('login');
Route::view('/edit-profile' , 'edit-profile')->name('edit-profile');
Route::view('/forget' , 'forget')->name('forget');
Route::view('/password-changed' , 'password-changed')->name('password-changed');
Route::view('/booking' , 'booking')->name('booking');

 
Route::post('/add-to-cart', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
Route::delete('/cart/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/packages', [IndexController::class, 'packages'])->name('packages');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('packages', PackageController::class);
});




Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Blog CRUD using resource routes
    Route::resource('blogs', BlogController::class);

    // Optional: Toggle status route (not included in standard resource)
    Route::post('blogs/toggle-status/{id}', [BlogController::class, 'toggleStatus'])->name('blogs.toggleStatus');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/notifications', function () {
        return view('admin.notifications');
    })->name('notifications.index');
});


Route::get('/change-password', function () {
    return view('profile.partials.change-password');
})->middleware('auth')->name('password.change');


Route::view('/privacy-policies', 'privacy-policies')->name('privacy');
Route::view('/terms', 'terms')->name('terms');
Route::view('/sitemap', 'sitemap')->name('sitemap');
Route::view('/help-support', 'help-support')->name('help-support');



require __DIR__.'/auth.php';