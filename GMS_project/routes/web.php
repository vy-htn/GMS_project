<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\AccessaryController;

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

Route::prefix('supplier')->name('supplier.')->group(function ()
{
	Route::get('/',[EmployeeController::class,'index']) ->name('index');
	Route::get('/add',[EmployeeController::class, 'getAdd']) ->name('getAdd');	
	Route::post('/add', [EmployeeController::class, 'postAdd'])->name('postAdd');
	Route::get('/edit/{id}', [EmployeeController::class, 'getEdit'])->name('getEdit');
	Route::post('/edit/{id}', [EmployeeController::class, 'postEdit'])->name('postEdit');
	Route::get('delete/{id}', [EmployeeController::class, 'delete'])->name('delete');});

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

Route::prefix('car')->name('car.')->group(function()
{
	Route::get('/',[CarController::class,'index'])->name('index');
	Route::get('/add',[CarController::class, 'getAdd'])->name('getAdd');
	Route::post('/add',[CarController::class, 'postAdd'])->name('postAdd');			
	Route::get('/detail/{id}',[CarController::class,'getDetail'])->name('getDetail');
	Route::post('/detail/{id}', [CarController::class, 'postDetail'])->name('postDetail');
	Route::get('/delete/{id}',[CarController::class,'Delete'])->name('Delete');
});

Route::prefix('supplier')->name('supplier.')->group(function()
{
	Route::get('/',[SupplierController::class,'index'])->name('index');
	Route::get('/add',[SupplierController::class, 'getAdd'])->name('getAdd');
	Route::post('/add',[SupplierController::class, 'postAdd'])->name('postAdd');			
	Route::get('/detail/{id}',[SupplierController::class,'getDetail'])->name('getDetail');
	Route::post('/detail/{id}', [SupplierController::class, 'postDetail'])->name('postDetail');
	Route::get('/delete/{id}',[SupplierController::class,'Delete'])->name('delete');
});

Route::prefix('accessary')->name('accessary.')->group(function()
{
	Route::get('/',[AccessaryController::class,'index'])->name('index');
	Route::get('/add',[AccessaryController::class, 'getAdd'])->name('getAdd');
	Route::post('/add',[AccessaryController::class, 'postAdd'])->name('postAdd');			
	Route::get('/detail/{id}',[AccessaryController::class,'getDetail'])->name('getDetail');
	Route::post('/detail/{id}', [AccessaryController::class, 'postDetail'])->name('postDetail');
	Route::get('/delete/{id}',[AccessaryController::class,'delete'])->name('delete');
});

Route::prefix('customercp')->name('customercp.booking.')->group(function()
{
	Route::get('/mainpage', function () {
		return view('customer_mainpage');
	});

	Route::get('/gmail',[BookingController::class, 'bookingGmail'])->name('gmail');

		Route::get('/booking/add',[BookingController::class, 'getAdd'])->name('getAdd');
	Route::post('/booking/add',[BookingController::class, 'postAdd'])->name('postAdd');
});




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/home/customer', CustomerController::class);
Route::resource('/home/job', JobController::class);
Route::resource('/home/dashboard', DashboardController::class);



// Route::resource('/home/customer', [App\Http\Controllers\CustomerController::class]);
Route::get('/customer-create', [App\Http\Controllers\CustomerController::class, 'create'])->name('customer.create');


Route::get('/home/hoa-don', function () {
    return view('hoa-don');
});