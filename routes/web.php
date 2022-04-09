<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AutoPartController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TestimonialController;
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

// Route::get('/', function () {
//     return view('index');
// })->name('home');
Route::get('/',[IndexController::class,'index'])->name('home');
Route::post('/contact-us',[ContactUsController::class,'store'])->name('contact-us.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware'=>'auth','prefix'=>'admin','as'=>'admin.'], function(){
    
    Route::resource('/gallery',GalleryController::class);
    Route::resource('/notifications',NotificationController::class);
    Route::resource('/testimonials', TestimonialController::class);
    Route::resource('/clients',ClientController::class);
    Route::resource('/services', ServiceController::class);
    Route::resource('/about-us',AboutUsController::class);
    Route::resource('/contact-us', ContactUsController::class)->except('store');
    Route::resource('/contacts', ContactController::class);
    Route::resource('/auto-parts', AutoPartController::class);
    Route::resource('/emails', EmailController::class);
    Route::resource('/facility',FacilityController::class);
});

require __DIR__.'/auth.php';
