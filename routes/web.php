<?php

use App\Http\Controllers\EmployeeController;
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

Route::get('/employees',[EmployeeController::class, 'index']);

Route::post('/add-employee',[EmployeeController::class, 'addEmployee'])->name('employee.add');

Route::get('/employees/{id}', [EmployeeController::class, 'getEmployeeById']);

Route::put('/employees', [EmployeeController::class, 'updateEmployee'])->name('employee.update');

Route::delete('/stupides/{id}', [EmployeeController::class, 'deleteEmployee']);
