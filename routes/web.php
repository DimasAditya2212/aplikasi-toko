<?php

use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\KasirController;
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
    return view('dashboard.index');
});





Route::post('/posts/create', [DashboardPostController::class, 'store']);

Route::resource('/posts', DashboardPostController::class);

Route::resource('/kasir', KasirController::class);

Route::get('ajax/request', [StudentController::class, 'ajaxRequest'])->name('ajax.request');
Route::post('ajax/request/store', [StudentController::class, 'ajaxRequestStore'])->name('ajax.request.store');
