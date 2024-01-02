<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home/customer', [App\Http\Controllers\CustomerController::class, 'index'])->name('home.customer');

// Route::resource('/home/customer', [App\Http\Controllers\CustomerController::class]);
Route::get('/customer-create', [App\Http\Controllers\CustomerController::class, 'create'])->name('customer.create');


Route::get('/home/hoa-don', function () {
    return view('hoa-don');
});
