<?php

namespace App\Http\Controllers;

use App\Imports\MastersImport;
use App\Models\Master;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MasterController extends Controller
{
    public function __construct( )
    {

        $this->middleware('permission:list-masters|create-masters|edit-masters|delete-masters', ['only' => ['index','show']]);
        $this->middleware('permission:create-masters', ['only' => ['create','store']]);
        $this->middleware('permission:edit-masters', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-masters', ['only' => ['destroy']]);

    }

    public function import_masters(Request $request)
    {

        Excel::import(new MastersImport, $request->excel_file);

        return redirect()->back()->with('success', 'Upload successful');

    }

    public function index()
    {

        $masters = Master::all();

        return view('masters.index', compact('masters'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('masters.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $master = new Master();

        $request->validate([
            'title' =>'required'
        ]);

        $master->title = $request->title;

        $master->save();

        return redirect()->route('masters.index')->with('message','Əlavə olundu');

    }

    /**
     * Display the specified resource.
     */
    public function show(Master $master)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Master $master)
    {

        return view('masters.edit', compact('master'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Master $master)
    {

        $request->validate([
            'title' =>'required'
        ]);

        $master->title = $request->title;
        $master->save();

        return redirect()->back()->with('message','Yeniləndi');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Master $master)
    {
        $master->delete();
        return redirect()->route('masters.index')->with('message','Silindi');
    }
}
