<?php

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

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');

Route::group(['middleware'=>['auth:sanctum', 'verified']],function (){
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('companies/ajax',[App\Http\Controllers\CompanyController::class, 'ajax'])->name('companies.ajax');
    Route::resource('companies',App\Http\Controllers\CompanyController::class);
    Route::get('employees/ajax',[App\Http\Controllers\EmployeeController::class, 'ajax'])->name('employees.ajax');
    Route::resource('employees',App\Http\Controllers\EmployeeController::class);
});

