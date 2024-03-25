<?php

namespace App\Http\Controllers;

use App\Models\PlanQuestion;
use Illuminate\Http\Request;

class PlanQuestionController extends Controller
{
    public function __construct()
    {

        $this->middleware('permission:list-plan_questions|create-plan_questions|edit-plan_questions|delete-plan_questions', ['only' => ['index','show']]);
        $this->middleware('permission:create-plan_questions', ['only' => ['create','store']]);
        $this->middleware('permission:edit-plan_questions', ['only' => ['edit']]);
        $this->middleware('permission:delete-plan_questions', ['only' => ['destroy']]);

    }

    public function index()
    {

        $plan_questions = PlanQuestion::orderBy('id', 'DESC')->get();
        return view('plan_questions.index', compact( 'plan_questions'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('plan_questions.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {

        $plan_question = new PlanQuestion();

        $request->validate([
            'title' => 'required'
        ]);

        $plan_question->title = $request->title;
        $plan_question->save();


        return redirect()->route('plan_questions.index')->with('message', 'Sual əlavə edildi.');

    }

    /**
     * Display the specified resource.
     */

    public function show(PlanQuestion $PlanQuestionRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(PlanQuestion $plan_question)
    {

        return view('plan_questions.edit', compact('plan_question'));

    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, PlanQuestion $plan_question)
    {


        $request->validate([
            'title' => 'required'
        ]);

        $plan_question->title = $request->title;
        $plan_question->save();

        return redirect()->back()->with('message', 'Sual dəyişdirildi.');

    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(PlanQuestion $plan_question)
    {

        $plan_question->delete();

        return redirect()->back()->with('message', 'Sual silindi.');

    }
}
