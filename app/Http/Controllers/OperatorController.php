<?php

namespace App\Http\Controllers;

use App\Imports\OperatorsImport;
use App\Models\Operator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class OperatorController extends Controller
{

//    public function __construct( )
//    {
//
//        $this->middleware('permission:list-operators|create-operators|edit-operators|delete-operators', ['only' => ['index','show']]);
//        $this->middleware('permission:create-operators', ['only' => ['create','store']]);
//        $this->middleware('permission:edit-operators', ['only' => ['edit','update']]);
//        $this->middleware('permission:delete-operators', ['only' => ['destroy']]);
//
//    }

    public function import_operators(Request $request)
    {

        Excel::import(new OperatorsImport, $request->excel_file);
        return redirect()->back()->with('success', 'Upload successful');

    }

    public function index()
    {

//        $operators = DB::table('operators')->get();
        $operators = Operator::all();
        return view('operators.index', compact('operators'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('operators.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $operator = new Operator();

        $request->validate([
            'title' =>'required'
        ]);

        $operator->title = $request->title;

        $operator->save();

        return redirect()->route('operators.index')->with('message','Əlavə olundu');

    }

    /**
     * Display the specified resource.
     */
    public function show(Operator $operator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Operator $operator)
    {

        return view('operators.edit', compact('operator'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Operator $operator)
    {

        $request->validate([
            'title' =>'required'
        ]);

        $operator->title = $request->title;
        $operator->save();

        return redirect()->back()->with('message','Yeniləndi');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Operator $operator)
    {
        $operator->delete();
        return redirect()->route('operators.index')->with('message','Silindi');
    }
}
