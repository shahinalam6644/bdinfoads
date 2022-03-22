<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/single/{id}', [HomeController::class, 'single']);
Route::get('/page/{id}', [HomeController::class, 'page']);

Route::get('/ads', [HomeController::class, 'ads']);

Route::get('/migrate', [HomeController::class, 'migrate']);

