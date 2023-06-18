<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;


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

Route::view('/', 'home/index')->name('home');


Route::get('employees', [EmployeeController::class, 'index'])
    ->name('employees');
Route::get('employees/create', [EmployeeController::class, 'create'])
    ->name('employees.create');
Route::post('employees', [EmployeeController::class, 'store'])
    ->name('employees.store');
Route::get('employees/{employee}', [EmployeeController::class, 'show'])
    ->name('employees.show');
Route::get('employees/{employee}/edit', [EmployeeController::class, 'edit'])
    ->name('employees.edit');
Route::put('employees/{employee}', [EmployeeController::class, 'update'])
    ->name('employees.update');
Route::delete('employees/{employee}', [EmployeeController::class, 'delete'])
    ->name('employees.delete');

Route::get('registration')
    ->name('registration');


Route::middleware('guest')->group(function () {
    Route::get('register', [RegisterController::class, 'index'])
        ->name('register');
    Route::post('register', [RegisterController::class, 'store'])
        ->name('register.store');

    Route::get('login', [LoginController::class, 'index'])
        ->name('login');
    Route::post('login', [LoginController::class, 'store'])
        ->name('login.store');
});
