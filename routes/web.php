<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\RoleController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/module', [App\Http\Controllers\ModuleController::class, 'index'])->name('module.index');

/**
 * Admin routes
 */
Route::group(['prefix' => 'admin','as'=>'admin.'], function () {
    Route::get('/', [DashboardController::class,'index'])->name('dashboard');

    Route::resource('roles',RoleController::class);
});




