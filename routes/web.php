<?php

use App\Http\Controllers\ActController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Settings\ActivityAreaController;
use App\Http\Controllers\Settings\BankController;
use App\Http\Controllers\Settings\CompanyCategoryController;
use App\Http\Controllers\Settings\CompanyNameController;
use App\Http\Controllers\Settings\CompanyAddressController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Settings\CompanyTypeController;
use App\Http\Controllers\Settings\ContractController;
use App\Http\Controllers\Settings\CurrencyController;
use App\Http\Controllers\Settings\EmployeeController;
use App\Http\Controllers\Settings\InstitutionController;
use App\Http\Controllers\Settings\MeetingTypeController;
use App\Http\Controllers\Settings\PaymentConditionController;
use App\Http\Controllers\Settings\PaymentTypeController;
use App\Http\Controllers\Settings\SenderController;
use App\Http\Controllers\Settings\ServiceOfferController;
use App\Http\Controllers\Settings\SourceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VatController;
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

Route::get('/', [PageController::class,'login'])->name('login');
Route::get('/register', [PageController::class,'register'])->name('register');
Route::post('/login_submit',[AuthController::class,'login_submit'])->name('login_submit');
Route::post('/register_submit',[AuthController::class,'register_submit'])->name('register_submit');

Route::group(['middleware' =>'auth'], function (){

    Route::get('/home', [PageController::class,'home'])->name('home');
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');

    Route::resource('users',UserController::class);
    Route::resource('roles',RoleController::class);
    Route::resource('permissions',PermissionController::class);
    Route::resource('customers',CustomerController::class);
    Route::resource('orders',OrderController::class);

    Route::post('/import_excel',[OrderController::class,'import_excel'])->name('import_excel');

});
