<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{

    public function __construct( )
    {

        $this->middleware('permission:list-groups|create-groups|edit-groups|delete-groups', ['only' => ['index','show']]);
        $this->middleware('permission:create-groups', ['only' => ['create','store']]);
        $this->middleware('permission:edit-groups', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-groups', ['only' => ['destroy']]);

    }

    public function index()
    {

        $groups = Group::with('users')->get();

        return view('groups.index', compact('groups'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('groups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $group = new Group();

        $request->validate([
            'title' =>'required'
        ]);

        $group->title = $request->title;

        $group->save();

        return redirect()->route('groups.index')->with('message','Əlavə olundu');

    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {

        return view('groups.edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group $group)
    {

        $request->validate([
            'title' =>'required'
        ]);

        $group->title = $request->title;
        $group->save();

        return redirect()->back()->with('message','Yeniləndi');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        $group->delete();
        return redirect()->route('groups.index')->with('message','Silindi');
    }
}
