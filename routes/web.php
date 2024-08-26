<?php

use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AinfoController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ArkeologiController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Artisan;

Route::get('/', [ArkeologiController::class, 'home']);
Route::get('/json', [ArkeologiController::class, 'json']);
Route::get('/detail_lokasi/{id}', [ArkeologiController::class, 'detail_lokasi']);
Route::get('/maps', [ArkeologiController::class, 'maps']);
Route::get('/info', [ArkeologiController::class, 'info']);
Route::get('/contact', [ArkeologiController::class, 'contact']);
Route::get('/det/{id}', [ArkeologiController::class, 'detail']);

//Register & Login
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
// Route::get('/test', [LoginController::class, 'test']);
Route::post('/login', [LoginController::class, 'store']);
Route::get('/logout', [LoginController::class, 'logout']);

//Admin CRUD
Route::resource('/a_daftar', DashboardController::class)->middleware('auth');
Route::post('/vote', [DashboardController::class, 'vote']);
Route::get('/detail/{id}', [DashboardController::class, 'detail']);
Route::get('/a_daftar/tambah_image/{id}', [DashboardController::class, 'tambah_image'])->middleware('auth');

// Admin
Route::get('/a_home', [AdminController::class, 'index'])->middleware('auth');
Route::get('/a_maps', [AdminController::class, 'maps'])->middleware('auth');
Route::get('/a_rute', [AdminController::class, 'rute'])->middleware('auth');
Route::get('/a_contact', [AdminController::class, 'contact'])->middleware('auth');
Route::resource('/a_info', AinfoController::class)->middleware('auth');
Route::get('/detail_lokasi/{id}', [AdminController::class, 'detail_lokasi']);
Route::get('/deletImage/{id}', [DashboardController::class, 'destroyImage'])->middleware('auth');
Route::get('/image', [ImageController::class, 'index']);
Route::post('/image', [ImageController::class, 'store']);

// Route::get('/a_daftar/tambah_pengunjung/{id}', [DashboardController::class, 'tambah_pengunjung'])->middleware('auth');
// Route::post('/a_daftar/update_pengunjung', [DashboardController::class, 'update_pengunjung'])->middleware('auth');
// Route::get('/dashboard/profile', [DashboardController::class, 'profile'])->middleware('auth');

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
    return 'Storage link created!';
});
