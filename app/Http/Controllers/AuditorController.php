<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AuditorController extends Controller
{
    public function __construct( )
    {

        $this->middleware('permission:list-auditors|create-auditors|edit-auditors|delete-auditors', ['only' => ['index','show']]);
        $this->middleware('permission:create-auditors', ['only' => ['create','store']]);
        $this->middleware('permission:edit-auditors', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-auditors', ['only' => ['destroy']]);

    }

    public function index()
    {
        $auditors = User::where('group_id', '!=' , null)->get();
        return view('auditors.index',compact('auditors'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {

        $roles = Role::all();
        $groups = Group::all();
        return view('auditors.create', compact('roles','groups'));

    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(RegisterRequest $request)
    {
        $user = new User();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        if($request->group_id){
            $user->group_id = $request->group_id;
        }

        $user->assignRole($request->role);

        $user->save();

        return redirect()->route('auditors.index')->with('message', 'Auditor əlavə edildi');

    }

    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(User $auditor)
    {

        $roles = Role::all();
        $groups = Group::all();
        return view('auditors.edit', compact('auditor','roles','groups'));

    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, User $auditor)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $auditor->id,
            'password' => 'nullable|string|min:8',
        ]);

        $auditor->name = $request->input('name');
        $auditor->email = $request->input('email');

        if ($request->password) {
            $auditor->password = Hash::make($request->password);
        }

        if($request->group_id){
            $auditor->group_id = $request->group_id;
        }

        $auditor->syncRoles();
        $auditor->assignRole($request->role);

        $auditor->save();

        return redirect()->back()->with('message','Auditor update edildi');

    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(User $user)
    {

        $user->delete();
        return redirect()->route('auditors.index')->with('message','İstifadəçi silindi');

    }
}
