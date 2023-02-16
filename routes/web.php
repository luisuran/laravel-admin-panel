<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Company routes
    Route::get('/companies/data-table', [CompanyController::class, 'indexDataTable'])->name('companies.data-table');
    Route::resource('/companies', CompanyController::class);

    // Employee routes
    Route::get('/employees/data-table', [EmployeeController::class, 'indexDataTable'])->name('employees.data-table');
    Route::resource('/employees', EmployeeController::class);
});

require __DIR__.'/auth.php';
