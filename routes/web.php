<?php

use App\Http\Controllers\AuditorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DistributeController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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
    Route::resource('orders',OrderController::class);
    Route::resource('groups',GroupController::class);
    Route::resource('auditors',AuditorController::class);

    Route::post('/import_excel',[OrderController::class,'import_excel'])->name('import_excel');

    Route::post('/distributeNewOrders', [DistributeController::class,'distributeNewOrders'])->name('distributeNewOrders');
    Route::post('/removeOrders', [DistributeController::class,'removeOrders'])->name('removeOrders');

    Route::get('/group_orders/{id}',[PageController::class,'group_orders'])->name('group_orders');

    Route::get('/share_orders',[PageController::class,'share_orders'])->name('share_orders');

});
