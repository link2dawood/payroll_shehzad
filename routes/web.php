<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Auth\Middleware\AdminAuthenticated;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\PhaseController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\Auth\EmployeeController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'welcome']);
// admin routes
// Route::group(['middleware' => 'adminauth', 'prefix' => 'admin', 'namespace' => 'Admin'], function () {
//     Route::get('/login', [AdminAuthController::class, 'getLogin'])->name('adminLogin');
//     Route::post('/login', [AdminAuthController::class, 'postLogin'])->name('adminLoginPost');

//     // Route::group(['middleware' => 'adminauth'], function () {
//     //     Route::get('/', function () {
//     //         return view('welcome');
//     //     })->name('adminDashboard');

//     // });
//     Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// });





Auth::routes();

Route::get('/user', function () {
    return view('auth.user');
})->middleware('auth');
Route::get('/compnay/list', UserController::class . '@index')->name('list')->middleware('auth');
// Route::get('comapny/list', 'App\Http\Controllers\CompanyController@index')->name('list');
// Route::get('comapny/create', 'App\Http\Controllers\CompanyController@create')->name('create');


// returns the form for adding a post
Route::get('/compnay/create', UserController::class . '@create')->name('create')->middleware('auth');
// adds a post to the database
Route::post('/compnay/store', UserController::class . '@store')->name('store')->middleware('auth');
// returns a page that shows a full post
Route::get('/compnay/list/{post}', UserController::class . '@show')->name('show')->middleware('auth');
// returns the form for editing a post
Route::get('/compnay/update/{post}/edit', UserController::class . '@edit')->name('edit')->middleware('auth');
// updates a post
Route::put('/compnay/update/{post}', UserController::class . '@update')->name('update')->middleware('auth');
// deletes a post
Route::delete('/compnay/delete/{post}', UserController::class . '@destroy')->name('destroy')->middleware('auth');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// property routes
Route::get('/property/list', PropertyController::class . '@index')->name('list.prop')->middleware('auth');
// returns the form for adding a post
Route::get('/property/create', PropertyController::class . '@create')->name('create.prop')->middleware('auth');
// adds a post to the database
Route::post('/property/store', PropertyController::class . '@store')->name('store.prop')->middleware('auth');
// returns a page that shows a full post
Route::get('/property/list/{post}', PropertyController::class . '@show')->name('show.prop')->middleware('auth');
// returns the form for editing a post
Route::get('/property/update/{post}/edit', PropertyController::class . '@edit')->name('edit.prop')->middleware('auth');
// updates a post
Route::put('/property/update/{post}', PropertyController::class . '@update')->name('update.prop')->middleware('auth');
// deletes a post
Route::get('/property/delete/{post}', PropertyController::class . '@destroy')->name('destroy.prop')->middleware('auth');



// phase routes
Route::get('/phase/list', PhaseController::class . '@index')->name('list.phase')->middleware('auth');
// returns the form for adding a post
Route::get('/phase/create', PhaseController::class . '@create')->name('create.phase')->middleware('auth');
// adds a post to the database
Route::post('/phase/store', PhaseController::class . '@store')->name('store.phase')->middleware('auth');
// returns a page that shows a full post
Route::get('/phase/list/{post}', PhaseController::class . '@show')->name('show.phase')->middleware('auth');
// returns the form for editing a post
Route::get('/phase/{post}/edit', PhaseController::class . '@edit')->name('edit.phase')->middleware('auth');
// updates a post
Route::put('/phase/update/{post}', PhaseController::class . '@update')->name('update.phase')->middleware('auth');
// deletes a post
Route::get('/phase/delete/{post}', PhaseController::class . '@destroy')->name('destroy.phase')->middleware('auth');


// employee routes
Route::get('/employee/create', EmployeeController::class . '@create')->name('create.employ')->middleware('auth');
Route::get('/employee/list', EmployeeController::class . '@index')->name('list.employ')->middleware('auth');
Route::get('/employee/salary', EmployeeController::class . '@salary')->name('salary')->middleware('auth');
// returns the form for adding a post

// adds a post to the database
Route::post('/employee/store', EmployeeController::class . '@store')->name('store.employ')->middleware('auth');
// returns a page that shows a full post
Route::get('/employee/list/{post}', EmployeeController::class . '@show')->name('show.employ')->middleware('auth');
// returns the form for editing a post
Route::get('/employee/update/{post}/edit', EmployeeController::class . '@edit')->name('edit.employ')->middleware('auth');
Route::get('/employee/salary/{post}/edit', EmployeeController::class . '@edit_salary')->name('edit.salary')->middleware('auth');
// updates a post
Route::put('/employee/update/{post}', EmployeeController::class . '@update')->name('update.employ')->middleware('auth');
Route::put('/employee/update_salary/{post}', EmployeeController::class . '@update_salary')->name('update.salary')->middleware('auth');
// deletes a post
Route::get('/employee/delete/{post}', EmployeeController::class . '@destroy')->name('destroy.employ')->middleware('auth');
Route::post('/employee/reset_password/{post}', EmployeeController::class . '@reset_password')->name('update.password')->middleware('auth');


//Payroll routes
Route::get('payroll', PayrollController::class  .'@index')->name('admin.payroll.index')->middleware('auth');;
Route::post('getdata/payroll', PayrollController::class  .'@getData')->name('admin.payroll.getData')->middleware('auth');;
Route::post('get-payroll-data', PayrollController::class  .'@getDataTable')->name('admin.payroll.getDataTable')->middleware('auth');;
Route::post('payroll/download-payroll', PayrollController::class   .'@payrollExportPDF')->name('admin.payroll.payrollExportPDF')->middleware('auth');;
Route::post('payroll/download-payslip', PayrollController::class  .'@payslipExportPDF')->name('admin.payroll.payslipExportPDF')->middleware('auth');;
