<?php

use App\Http\Controllers\CustomerController;
use App\Models\Customer;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/customers/create', [CustomerController::class, 'create']);
Route::get('customers', [CustomerController::class, 'index'])->name('customers.index');
Route::post('customers', [CustomerController::class, 'store']);
Route::delete('customers/{customer}',[CustomerController::class, 'destroy']);
Route::get('customers/{customer}/edit',[CustomerController::class, 'edit']);
Route::put('customers/{customer}/',[CustomerController::class, 'update']);
