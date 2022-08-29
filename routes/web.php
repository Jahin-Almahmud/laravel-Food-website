<?php

use App\Http\Controllers\admin\AboutsettingController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ChefController;
use App\Http\Controllers\admin\FoodController;
use App\Http\Controllers\admin\GalleryController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {

});
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('messages', [HomeController::class, 'message'])->name('messages');
Route::post('booktable', [HomeController::class, 'booktable'])->name('booktable');

Auth::routes();



Route::prefix('admin')->as('admin')->namespace('App\Http\Controllers\admin')->middleware('auth')->group(function () {
    Route::get('/home', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
    Route::post('/profile/password/change', [AdminController::class, 'passwordchange'])->name('profile.password.change');
    Route::get('/message', [AdminController::class, 'message'])->name('messages');
    Route::DELETE ('/message/{id}', [AdminController::class, 'delete'])->name('message.delete');
    Route::get('/booktable', [AdminController::class, 'booktable'])->name('booktable');
    Route::DELETE ('/booktable/{id}', [AdminController::class, 'booktabledelete'])->name('booktable.delete');
    Route::resource('category', CategoryController::class);
    Route::resource('food', FoodController::class);
    Route::resource('chef', ChefController::class);
    Route::resource('gallery', GalleryController::class);
    Route::resource('slider', SliderController::class);
    Route::resource('about', AboutsettingController::class);
    Route::get('/status/{id}', [AboutsettingController::class, 'status'])->name('about.status');
});
