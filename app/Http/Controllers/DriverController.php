<?php

namespace App\Http\Controllers;

use App\Imports\DriversImport;
use App\Models\Driver;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class DriverController extends Controller
{
    public function __construct( )
    {

        $this->middleware('permission:list-drivers|create-drivers|edit-drivers|delete-drivers', ['only' => ['index','show']]);
        $this->middleware('permission:create-drivers', ['only' => ['create','store']]);
        $this->middleware('permission:edit-drivers', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-drivers', ['only' => ['destroy']]);

    }

    public function import_drivers(Request $request)
    {


        Excel::import(new DriversImport, $request->excel_file);

        return redirect()->back()->with('success', 'Upload successful');

    }

    public function index()
    {

        $drivers = Driver::all();

        return view('drivers.index', compact('drivers'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('drivers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $driver = new Driver();

        $request->validate([
            'title' =>'required'
        ]);

        $driver->title = $request->title;

        $driver->save();

        return redirect()->route('drivers.index')->with('message','Əlavə olundu');

    }

    /**
     * Display the specified resource.
     */
    public function show(Driver $driver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Driver $driver)
    {

        return view('drivers.edit', compact('driver'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Driver $driver)
    {

        $request->validate([
            'title' =>'required'
        ]);

        $driver->title = $request->title;
        $driver->save();

        return redirect()->back()->with('message','Yeniləndi');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Driver $driver)
    {
        $driver->delete();
        return redirect()->route('drivers.index')->with('message','Silindi');
    }
}
