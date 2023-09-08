<?php

use App\Http\Controllers\AuditorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DistributeController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\GroupOrderController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkerController;
use Illuminate\Support\Facades\Cache;
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

Route::get('/clear',function (){
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
    return 'Success';
});

Route::get('/link',function (){
    \Illuminate\Support\Facades\Artisan::call('storage:link');
    return 'Success';
});

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
    Route::resource('masters',MasterController::class);
    Route::resource('workers',WorkerController::class);


    Route::post('/import_excel',[OrderController::class,'import_excel'])->name('import_excel');

    Route::post('/distributeNewOrders', [DistributeController::class,'distributeNewOrders'])->name('distributeNewOrders');
    Route::post('/removeOrders', [DistributeController::class,'removeOrders'])->name('removeOrders');

    Route::get('/new_group_orders/{id}',[PageController::class,'new_group_orders'])->name('group_orders'); //for admin
    Route::get('/worked_group_orders/{id}',[PageController::class,'worked_group_orders'])->name('worked_group_orders'); //for admin

    Route::get('/new_auditor_orders/{id}',[GroupOrderController::class,'new_auditor_orders'])->name('auditor_orders');
    Route::get('/worked_auditor_orders/{id}',[GroupOrderController::class,'worked_auditor_orders'])->name('worked_auditor_orders');
    Route::get('/auditor_orders_edit/{order}',[GroupOrderController::class,'auditor_orders_edit'])->name('auditor_orders_edit');
    Route::put('/auditor_orders_update/{order}',[GroupOrderController::class,'auditor_orders_update'])->name('auditor_orders_update');

    Route::get('/share_orders',[PageController::class,'share_orders'])->name('share_orders');

    Route::get('/order_status/{auditor_status}',[PageController::class,'order_status'])->name('order_status')->middleware('role:admin');
    Route::get('/edit_order_status/{order}',[PageController::class,'edit_order_status'])->name('edit_order_status')->middleware('role:admin');
    Route::post('/update_order_status/{order}',[PageController::class,'update_order_status'])->name('update_order_status')->middleware('role:admin');

    Route::get('/test', function (){
        if(!Cache::has('orders')){

            $data = \App\Models\Order::all();
            Cache::put('orders', $data);

        }else{

            $orders = Cache::get('orders');

        }

       return view('test.index', compact('orders'));

    });

    Route::get('/delete_cache', function (){
        Cache::delete('orders');
    });

});
