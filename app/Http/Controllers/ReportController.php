<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Master;
use App\Models\Order;
use App\Models\User;
use App\Models\Worker;
use App\Services\ReportService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $filter = new ReportService();
        $data = $filter->filter($request);



        $auditors = DB::table('users')->whereNotNull('group_id')->get();

        $groups = Group::with('users')->get();

        return view('reports.index', compact('groups','auditors','data'));

    }

    public function edit(Order $order)
    {

        $masters = Master::all();
        $workers = Worker::all();

        return view('reports.edit', compact('order','masters','workers'));

    }
}
