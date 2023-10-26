<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Group;
use App\Models\Master;
use App\Models\Order;
use App\Models\QuestionCat;
use App\Models\User;
use App\Models\Worker;
use App\Services\ReportService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\OrdersExport;
class ReportController extends Controller
{

    public function edit($id)
    {

        $order = Order::withTrashed()
            ->with(['questions' => function ($q) {
                $q->withTrashed();
            }])
            ->with('images')
            ->with(['masters' => function ($q) {
                $q->withTrashed();
            }])
            ->with(['workers' => function ($q) {
                $q->withTrashed();
            }])
            ->findOrFail($id);

        $question_cats = QuestionCat::with(['questions' => function ($q) {
            $q->withTrashed();
        }])->get();

        $masters = Master::withTrashed()->get();

        $workers = Worker::withTrashed()->get();

        $drivers = Driver::withTrashed()->get();

        return view('reports.edit', compact('order','masters','workers','question_cats','drivers'));

    }

    public function index(Request $request)
    {

        $filter = new ReportService();
        $data = $filter->filter($request);

        $auditors = DB::table('users')->whereNotNull('group_id')->get();

        $groups = Group::with('users')->get();

        return view('reports.index', compact('groups','auditors','data'));

    }

    public function export(Request $request)
    {

        $filter = new ReportService();

        $orders = $filter->forExcel($request);

        return Excel::download(new OrdersExport($orders), 'orders.xlsx');

    }

//    public function export_excel_new(Request $request)
//    {
//        return Excel::download(new OrdersExport($orders), 'orders.xlsx');
//    }

}
