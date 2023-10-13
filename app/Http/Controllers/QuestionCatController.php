<?php

namespace App\Http\Controllers;

use App\Models\QuestionCat;
use Illuminate\Http\Request;

class QuestionCatController extends Controller
{
    public function __construct()
    {

        $this->middleware('permission:list-question_cats|create-question_cats|edit-question_cats|delete-question_cats', ['only' => ['index','show']]);
        $this->middleware('permission:create-question_cats', ['only' => ['create','store']]);
        $this->middleware('permission:edit-question_cats', ['only' => ['edit']]);
        $this->middleware('permission:delete-question_cats', ['only' => ['destroy']]);

    }

    public function index()
    {

        $question_cats = QuestionCat::orderBy('id', 'DESC')->get();
        return view('question_cats.index', compact( 'question_cats'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('question_cats.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {

        $question_cat = new QuestionCat();

        $request->validate([
            'title' => 'required'
        ]);

        $question_cat->title = $request->title;
        $question_cat->save();



        return redirect()->route('question_cats.index')->with('message', 'Kateqoriya əlavə edildi.');

    }

    /**
     * Display the specified resource.
     */

    public function show(QuestionCat $QuestionCatRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(QuestionCat $question_cat)
    {

        return view('question_cats.edit', compact('question_cat'));

    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, QuestionCat $question_cat)
    {


        $request->validate([
            'title' => 'required'
        ]);

        $question_cat->title = $request->title;
        $question_cat->save();

        return redirect()->back()->with('message', 'Kateqoriya dəyişdirildi.');

    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(QuestionCat $question_cat)
    {

        $question_cat->delete();

        return redirect()->back()->with('message', 'Kateqoriya silindi.');

    }
}
