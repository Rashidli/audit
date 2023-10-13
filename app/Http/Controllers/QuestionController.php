<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\QuestionCat;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function __construct()
    {

        $this->middleware('permission:list-questions|create-questions|edit-questions|delete-questions', ['only' => ['index','show']]);
        $this->middleware('permission:create-questions', ['only' => ['create','store']]);
        $this->middleware('permission:edit-questions', ['only' => ['edit']]);
        $this->middleware('permission:delete-questions', ['only' => ['destroy']]);

    }

    public function index()
    {

        $questions = Question::orderBy('id', 'DESC')->get();
        return view('questions.index', compact( 'questions'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $question_cats = QuestionCat::all();
        return view('questions.create', compact('question_cats'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {

        $question = new Question();

        $request->validate([
            'title' => 'required',
            'question_cat_id' => 'required',
            'level' => 'required',
        ]);

        $question->title = $request->title;
        $question->level = $request->level;
        $question->question_cat_id = $request->question_cat_id;

        $question->save();



        return redirect()->route('questions.index')->with('message', 'Sual əlavə edildi.');

    }

    /**
     * Display the specified resource.
     */

    public function show(Question $QuestionRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Question $question)
    {
        $question_cats = QuestionCat::all();
        return view('questions.edit', compact('question','question_cats'));

    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Question $question)
    {


        $request->validate([
            'title' => 'required',
            'question_cat_id' => 'required',
            'level' => 'required',
        ]);

        $question->title = $request->title;
        $question->level = $request->level;
        $question->question_cat_id = $request->question_cat_id;

        $question->save();

        return redirect()->back()->with('message', 'Sual dəyişdirildi.');

    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Question $question)
    {

        $question->delete();

        return redirect()->back()->with('message', 'Sual silindi.');

    }
}
