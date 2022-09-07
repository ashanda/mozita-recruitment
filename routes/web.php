<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployersController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserEmployersController;
use App\Http\Controllers\UserEmployeesController;
use App\Http\Controllers\UserCategoryController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UserNotificationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;




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

Route::get('/ajax-subcat',function (Request $request) {
     $cat_id = $request->cat_id;
     $subcategories = DB::table('categories')->where('parent_id', '=',$cat_id)->get();
     return Response::json($subcategories);
});
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
    Route::resource('/admin/categories', CategoryController::class);
    Route::get('/admin/sub_create', [CategoryController::class,'sub_create']);
    Route::resource('/admin/settings', SettingsController::class);
    Route::resource('/admin/notification', NotificationController::class);
    Route::get('status', [UserController::class, 'userOnlineStatus']);
});
  
/*------------------------------------------
--------------------------------------------
All Employer Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:employer'])->group(function () {
  
    Route::get('/employer/home', [HomeController::class, 'employerHome'])->name('employer.home');
    Route::resource('/employer/user_employer', UserEmployersController::class);
    Route::resource('/employer/user_notification', UserNotificationController::class);
    //------------------------------------------

});


/*------------------------------------------
--------------------------------------------
All Employee Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:employee'])->group(function () {
  
    Route::get('/employee/home', [HomeController::class, 'employeeHome'])->name('employee.home');
    Route::resource('/employee/user_employee',  UserEmployeesController::class);
    Route::resource('/employee/user_categories', UserCategoryController::class);
    Route::get('/employee/sub_create', [UserCategoryController::class,'sub_create']);
    //------------------------------------------

});