<?php

namespace App\Http\Controllers;

use App\Imports\WorkersImport;
use App\Models\Worker;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class WorkerController extends Controller
{
    public function __construct( )
    {

        $this->middleware('permission:list-workers|create-workers|edit-workers|delete-workers', ['only' => ['index','show']]);
        $this->middleware('permission:create-workers', ['only' => ['create','store']]);
        $this->middleware('permission:edit-workers', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-workers', ['only' => ['destroy']]);

    }

    public function import_workers(Request $request)
    {


        Excel::import(new WorkersImport, $request->excel_file);

        return redirect()->back()->with('success', 'Upload successful');

    }

    public function index()
    {

        $workers = Worker::all();

        return view('workers.index', compact('workers'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('workers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $worker = new Worker();

        $request->validate([
            'title' =>'required'
        ]);

        $worker->title = $request->title;

        $worker->save();

        return redirect()->route('workers.index')->with('message','Əlavə olundu');

    }

    /**
     * Display the specified resource.
     */
    public function show(Worker $worker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Worker $worker)
    {

        return view('workers.edit', compact('worker'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Worker $worker)
    {

        $request->validate([
            'title' =>'required'
        ]);

        $worker->title = $request->title;
        $worker->save();

        return redirect()->back()->with('message','Yeniləndi');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Worker $worker)
    {
        $worker->delete();
        return redirect()->route('workers.index')->with('message','Silindi');
    }
}
