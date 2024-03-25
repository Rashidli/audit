<?php

use App\Http\Controllers\AuditorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DistributeController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\GroupOrderController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PlanOrderController;
use App\Http\Controllers\PlanQuestionController;
use App\Http\Controllers\PlanReportController;
use App\Http\Controllers\QuestionCatController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ReportController;
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

Route::get('/migrate',function (){
    \Illuminate\Support\Facades\Artisan::call('migrate');
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
    Route::resource('question_cats',QuestionCatController::class);
    Route::resource('questions',QuestionController::class);
    Route::resource('drivers',DriverController::class);
    Route::resource('operators',OperatorController::class);
    Route::resource('plan_questions',PlanQuestionController::class);
    Route::resource('plan_orders',PlanOrderController::class);
    Route::resource('plan_reports',PlanReportController::class);

    Route::any('/import_operators',[OperatorController::class,'import_operators'])->name('import_operators');
    Route::any('/import_drivers',[DriverController::class,'import_drivers'])->name('import_drivers');
    Route::any('/import_masters',[MasterController::class,'import_masters'])->name('import_masters');
    Route::any('/import_workers',[WorkerController::class,'import_workers'])->name('import_workers');

    Route::any('/insert_excel',[OrderController::class,'insert_excel'])->name('insert_excel');

    Route::post('/distributeNewOrders', [DistributeController::class,'distributeNewOrders'])->name('distributeNewOrders');
    Route::post('/removeOrders', [DistributeController::class,'removeOrders'])->name('removeOrders');

    Route::get('/new_group_orders/{id}',[PageController::class,'new_group_orders'])->name('group_orders'); //for admin
    Route::get('/worked_group_orders/{id}',[PageController::class,'worked_group_orders'])->name('worked_group_orders'); //for admin

    Route::get('/new_auditor_orders/{id?}',[GroupOrderController::class,'new_auditor_orders'])->name('auditor_orders');
    Route::get('/worked_auditor_orders/{id?}',[GroupOrderController::class,'worked_auditor_orders'])->name('worked_auditor_orders');
    Route::get('/auditor_orders_edit/{order}',[GroupOrderController::class,'auditor_orders_edit'])->name('auditor_orders_edit');
    Route::put('/auditor_orders_update/{order}',[GroupOrderController::class,'auditor_orders_update'])->name('auditor_orders_update');
    Route::get('/auditor_create_order',[GroupOrderController::class,'auditor_create_order'])->name('auditor_create_order');
    Route::get('/evakuasiya_create_order',[GroupOrderController::class,'evakuasiya_create_order'])->name('evakuasiya_create_order');
    Route::post('/auditor_store_order',[GroupOrderController::class,'auditor_store_order'])->name('auditor_store_order');

    Route::get('/share_orders/{mixin_single}',[PageController::class,'share_orders'])->name('share_orders');

    Route::get('/order_status/{auditor_status?}',[PageController::class,'order_status'])->name('order_status')->middleware('role:admin');
    Route::get('/satisfied_customers',[PageController::class,'satisfied_customers'])->name('satisfied_customers')->middleware('role:admin');
    Route::get('/satisfied_customers_edit/{id}',[PageController::class,'satisfied_customers_edit'])->name('satisfied_customers_edit')->middleware('role:admin');
    Route::post('/satisfied_customers_update/{order}',[PageController::class,'satisfied_customers_update'])->name('satisfied_customers_update')->middleware('role:admin');
    Route::get('/edit_order_status/{id}/{level_id?}',[PageController::class,'edit_order_status'])->name('edit_order_status')->middleware('role:admin');
    Route::post('/update_order_status/{order}',[PageController::class,'update_order_status'])->name('update_order_status')->middleware('role:admin');

    Route::get('/report', [ReportController::class, 'index'])->name('report');
    Route::get('/edit_report/{order}', [ReportController::class, 'edit'])->name('report_edit');
    Route::get('/report_export',[ReportController::class,'export'])->name('report_export');
    Route::delete('/destroy_order',[ReportController::class,'destroy'])->name('report.destroy');

//    Route::get('/export_excel_new',[ReportController::class,'export_excel_new'])->name('export_excel_new');

});
