<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\TopCategoryController;
use App\Http\Controllers\MidCategoryController;
use App\Http\Controllers\LowCategoryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MenController;
use App\Http\Controllers\WomenController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AjaxCategoryController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\CareerDoctorController;
use App\Http\Controllers\CareerApplicationController;
use App\Http\Controllers\CartController;   
use App\Http\Controllers\AdminController; 
use App\Http\Controllers\DashboardController; 
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\Admin\PackageController; 


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //
    Route::post('/booking/confirm', [BookingController::class, 'confirm'])->name('booking.confirm');
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::post('/choose-package/{package}', [DashboardController::class, 'choosePackage'])->name('choose.package');

});

 
Route::get('/units', [PropertyController::class, 'units'])->name('units.index');
Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');
Route::get('/properties/create', [PropertyController::class, 'create'])->name('properties.create');
Route::post('/properties/store', [PropertyController::class, 'store'])->name('properties.store');




 Route::get('/', [IndexController::class, 'index'])->name('index');

// Route::view('/', 'home')->name('home'); // Home Page
Route::view('/packages', 'packages')->name('packages');
Route::view('/blog', 'blog')->name('blog');
Route::view('/contact', 'contact')->name('contact');
Route::view('/about-us', 'about')->name('about');
Route::view('/wallet', 'wallet')->name('wallet');
Route::view('/card', 'card')->name('card');
Route::view('/login' , 'login')->name('login');
Route::view('/edit-profile' , 'edit-profile')->name('edit-profile');
Route::view('/forget' , 'forget')->name('forget');
Route::view('/password-changed' , 'password-changed')->name('password-changed');
Route::view('/booking' , 'booking')->name('booking');

Route::view('/doctor-details' , 'doctor-details')->name('doctor-details');
Route::view('/treatments-type-men' , 'treatments-type-men')->name('treatments-type-men');
Route::view('/treatments-type-women' , 'treatments-type-women')->name('treatments-type-women');


 
Route::post('/add-to-cart', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
Route::delete('/cart/{id}', [CartController::class, 'remove'])->name('cart.remove');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('packages', PackageController::class);
});


Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    Route::resource('genders', GenderController::class);
    Route::resource('top-categories', TopCategoryController::class);
    Route::resource('mid-categories', MidCategoryController::class);
    Route::resource('services', ServiceController::class);
  
    Route::post('/mid-categories/{midCategory}/upload-image', [MidCategoryController::class, 'uploadImage']);

});



Route::prefix('admin')->group(function () {
    // Use AjaxCategoryController for all dynamic AJAX-based category fetching
    Route::get('get-top-categories/{gender_id}', [AjaxCategoryController::class, 'getTopCategories'])->name('ajax.getTopCategories');
    Route::get('get-mid-categories/{top_category_id}', [AjaxCategoryController::class, 'getMidCategories'])->name('ajax.getMidCategories');
});

Route::post('/admin/services/toggle-status/{id}', [ServiceController::class, 'toggleStatus'])->name('services.toggleStatus');


Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::resource('blogs', BlogController::class);
}); 
Route::post('/admin/blogs/toggle-status/{id}', [BlogController::class, 'toggleStatus'])->name('blogs.toggleStatus');

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::resource('doctor_details', DoctorController::class);
});

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::resource('careers', CareerDoctorController::class);
});





// Must match fetch() URL
Route::post('/admin/doctor_details/toggle-status/{id}', [DoctorController::class, 'toggleStatus'])->name('doctor_details.toggleStatus');


Route::post('/admin/doctors/{id}/upload-image', [DoctorController::class, 'uploadImage']);
Route::get('/doctors', [IndexController::class, 'frontendIndex'])->name('frontend.doctors.index');
Route::get('/doctors/{doctor}', [DoctorController::class, 'frontendShow'])->name('frontend.doctors.show');

Route::get('/careers', [CareerDoctorController::class, 'frontendIndex'])->name('careers');
Route::post('/admin/careers/toggle-status/{id}', [CareerDoctorController::class, 'toggleStatus']);
Route::post('/careers/apply', [CareerApplicationController::class, 'apply'])->name('careers.apply');

 

//frontend

Route::get('/blogs', [BlogController::class, 'frontendIndex'])->name('blogs');
Route::get('/blogs/{slug}', [BlogController::class, 'show'])->name('blogs.show');



// Services list by mid category
Route::get('{gender}/services/{mid}', [ServiceController::class, 'services'])->name('services');
 
Route::get('service/{slug}', [ServiceController::class, 'serviceDetail'])->name('service.detail');

Route::get('/change-password', function () {
    return view('profile.partials.change-password');
})->middleware('auth')->name('password.change');

  // Toggle Status Route

  



Route::view('/privacy-policies', 'privacy-policies')->name('privacy');
Route::view('/terms', 'terms')->name('terms');
Route::view('/sitemap', 'sitemap')->name('sitemap');
Route::view('/help-support', 'help-support')->name('help-support');



require __DIR__.'/auth.php';