<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BookingController;


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

Route::prefix('employee')->name('employee.')->group(function ()
{
	Route::get('/',[EmployeeController::class,'index']) ->name('index');
	Route::get('/add',[EmployeeController::class, 'getAdd']) ->name('getAdd');	
	Route::post('/add', [EmployeeController::class, 'postAdd'])->name('postAdd');
	Route::get('/edit/{id}', [EmployeeController::class, 'getEdit'])->name('getEdit');
	Route::post('/edit/{id}', [EmployeeController::class, 'postEdit'])->name('postEdit');
	Route::get('delete/{id}', [EmployeeController::class, 'delete'])->name('delete');
	Route::get('/get-positions/{id}', [EmployeeController::class, 'getPositionsByDepartment']);
});

Route::prefix('order')->name('order.')->group(function ()
{
	Route::get('/',[OrderController::class,'index'])->name('index');
	Route::get('/add',[OrderController::class, 'getAdd'])->name('getAdd');	
	Route::post('/add',[OrderController::class, 'postAdd'])->name('getAdd');	
	Route::get('/addOrder',[OrderController::class, 'postAdd'])->name('postAdd');	
	Route::get('/edit/{id}',[OrderController::class,'getEdit'])->name('getEdit');
	Route::get('/loadAccessary',[OrderController::class,'loadAccessary'])->name('loadAccessary');
	Route::get('/updateAccessaryList',[OrderController::class,'updateAccessaryList'])->name('updateAccessaryList');
	Route::get('delete/{id}', [OrderController::class, 'delete'])->name('delete');
});

Route::prefix('booking')->name('booking.')->group(function()
{
	Route::get('/',[BookingController::class,'index'])->name('index');	
	Route::get('/detail/{id}',[BookingController::class,'getDetail'])->name('getDetail');
	Route::get('/detail/{id}',[BookingController::class,'getDetail'])->name('getDetail');
	Route::get('/updateStatus/{id}',[BookingController::class,'updateStatus'])->name('updateStatus');
	Route::get('/cancel/{id}',[BookingController::class,'Cancel'])->name('Cancel');
});

Route::prefix('customercp')->name('customercp.booking.')->group(function()
{
	Route::get('/booking/add',[BookingController::class, 'getAdd'])->name('getAdd');
	Route::post('/booking/add',[BookingController::class, 'postAdd'])->name('postAdd');
});


Route::post('booking/add', [BookingController::class, 'postAdd']);
