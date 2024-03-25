<?php

namespace App\Http\Controllers;
use App\Models\PlanOrder;
use App\Services\ReportService;
use Illuminate\Http\Request;

class PlanReportController extends Controller
{
    public function __construct()
    {

        $this->middleware('permission:list-plan_reports|create-plan_reports|edit-plan_reports|delete-plan_reports', ['only' => ['index','show']]);
        $this->middleware('permission:create-plan_reports', ['only' => ['create','store']]);
        $this->middleware('permission:edit-plan_reports', ['only' => ['edit']]);
        $this->middleware('permission:delete-plan_reports', ['only' => ['destroy']]);

    }

    public function index(Request $request)
    {
        $filter = new ReportService();
        $data = $filter->plan_filter($request);
        return view('plan_reports.index', compact( 'data'));

    }

    public function edit(PlanOrder $plan_order)
    {

        return view('plan_reports.edit', compact('plan_order'));

    }


}
