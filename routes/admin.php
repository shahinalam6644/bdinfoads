<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SlidersController;
use App\Http\Controllers\PosttypeController;
use App\Http\Controllers\AdsController;

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

Route::get('/dashboard', [AdminController::class, 'dashboard']);

//make category
Route::get('/dashboard/categories/', [CategoriesController::class, 'index']);
Route::get('/dashboard/categories/create', [CategoriesController::class, 'create']);
Route::post('/dashboard/categories', [CategoriesController::class, 'store']);
Route::get('/dashboard/categories/{id}', [CategoriesController::class, 'show']);
Route::get('/dashboard/categories/{id}/edit', [CategoriesController::class, 'edit']);
Route::patch('/dashboard/categories/{id}', [CategoriesController::class, 'update']);
Route::delete('/dashboard/categories/{id}', [CategoriesController::class, 'destroy']);

//login registration
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'prosessRegister']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'processLogin']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//show all user for admin----------------------------------
Route::get('/dashboard/showUser', [AdminController::class, 'showUser']);
Route::delete('/dashboard/delete/{id}', [AdminController::class, 'destroy']);
Route::get('/dashboard/user/create', [AdminController::class, 'create']);
Route::get('/dashboard/singleUser/{id}', [AdminController::class, 'singleUser']);
Route::get('/dashboard/user/{id}/edit', [AdminController::class, 'edit']);
Route::patch('/dashboard/user/{id}', [AdminController::class, 'update']);
//show profile
Route::get('/dashboard/profile', [AdminController::class, 'profile']);

//post controller----------
Route::get('/dashboard/posts/', [PostController::class, 'index']);
Route::get('/dashboard/posts/create', [PostController::class, 'create']);
Route::post('/dashboard/posts', [PostController::class, 'store']);
Route::get('/dashboard/posts/{id}', [PostController::class, 'show']);
Route::get('/dashboard/posts/{id}/edit', [PostController::class, 'edit']);
Route::patch('/dashboard/posts/{id}', [PostController::class, 'update']);
Route::delete('/dashboard/posts/{id}', [PostController::class, 'destroy']);

//Media controller----------
Route::get('/dashboard/media/', [MediaController::class, 'index']);
Route::get('/dashboard/media/create', [MediaController::class, 'create']);
Route::post('/dashboard/media', [MediaController::class, 'store']);
Route::get('/dashboard/media/{id}', [MediaController::class, 'show']);
Route::get('/dashboard/media/{id}/edit', [MediaController::class, 'edit']);
Route::patch('/dashboard/media/{id}', [MediaController::class, 'update']);
Route::delete('/dashboard/media/{id}', [MediaController::class, 'destroy']);

//Pages controller----------
Route::get('/dashboard/pages/', [PageController::class, 'index']);
Route::get('/dashboard/pages/create', [PageController::class, 'create']);
Route::post('/dashboard/pages', [PageController::class, 'store']);
Route::get('/dashboard/pages/{id}', [PageController::class, 'show']);
Route::get('/dashboard/pages/{id}/edit', [PageController::class, 'edit']);
Route::patch('/dashboard/pages/{id}', [PageController::class, 'update']);
Route::delete('/dashboard/pages/{id}', [PageController::class, 'destroy']);

//Settings----- not wrk
Route::get('/dashboard/settings/', [SettingsController::class, 'index']);
Route::get('/dashboard/settings/create', [SettingsController::class, 'create']);
Route::post('/dashboard/settings/', [SettingsController::class, 'store']);
Route::get('/dashboard/settings/{id}', [SettingsController::class, 'show']);
Route::get('/dashboard/settings/{id}/edit', [SettingsController::class, 'edit']);
Route::patch('/dashboard/settings/{id}', [SettingsController::class, 'update']);
Route::delete('/dashboard/settings/{id}', [SettingsController::class, 'destroy']);


//Slider----- 
Route::get('/dashboard/sliders/', [SlidersController::class, 'index']);
Route::get('/dashboard/sliders/create', [SlidersController::class, 'create']);
Route::post('/dashboard/sliders/', [SlidersController::class, 'store']);
Route::get('/dashboard/sliders/{id}', [SlidersController::class, 'show']);
Route::get('/dashboard/sliders/{id}/edit', [SlidersController::class, 'edit']);
Route::patch('/dashboard/sliders/{id}', [SlidersController::class, 'update']);
Route::delete('/dashboard/sliders/{id}', [SlidersController::class, 'destroy']);

// Route::get('/dashboard/search', [AdminController::class, 'search']);

//make category
Route::get('/dashboard/posttypes/', [PosttypeController::class, 'index']);
Route::get('/dashboard/posttypes/create', [PosttypeController::class, 'create']);
Route::post('/dashboard/posttypes', [PosttypeController::class, 'store']);
Route::get('/dashboard/posttypes/{id}', [PosttypeController::class, 'show']);
Route::get('/dashboard/posttypes/{id}/edit', [PosttypeController::class, 'edit']);
Route::patch('/dashboard/posttypes/{id}', [PosttypeController::class, 'update']);
Route::delete('/dashboard/posttypes/{id}', [PosttypeController::class, 'destroy']);


//make ads
Route::get('/dashboard/ads/', [AdsController::class, 'index']);
Route::get('/dashboard/ads/create', [AdsController::class, 'create']);
Route::post('/dashboard/ads', [AdsController::class, 'store']);
Route::get('/dashboard/ads/{id}', [AdsController::class, 'show']);
Route::get('/dashboard/ads/{id}/edit', [AdsController::class, 'edit']);
Route::patch('/dashboard/ads/{id}', [AdsController::class, 'update']);
Route::delete('/dashboard/ads/{id}', [AdsController::class, 'destroy']);