<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployersController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Auth;

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
  
/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::resource('/admin/user', UserController::class);
    Route::resource('/admin/employer', EmployersController::class);
    Route::resource('/admin/employee', EmployeesController::class);
    Route::resource('/admin/settings', SettingsController::class);
    Route::get('status', [UserController::class, 'userOnlineStatus']);
});
  
/*------------------------------------------
--------------------------------------------
All Employer Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:employer'])->group(function () {
  
    Route::get('/employer/home', [HomeController::class, 'employerHome'])->name('employer.home');
});


/*------------------------------------------
--------------------------------------------
All Employee Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:employee'])->group(function () {
  
    Route::get('/employee/home', [HomeController::class, 'employeeHome'])->name('employee.home');
});