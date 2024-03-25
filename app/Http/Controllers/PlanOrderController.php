<?php

namespace App\Http\Controllers;

use App\Models\PlanOrder;
use App\Models\PlanQuestion;
use Illuminate\Http\Request;

class PlanOrderController extends Controller
{
    public function __construct()
    {

        $this->middleware('permission:list-plan_orders|create-plan_orders|edit-plan_orders|delete-plan_orders', ['only' => ['index','show']]);
        $this->middleware('permission:create-plan_orders', ['only' => ['create','store']]);
        $this->middleware('permission:edit-plan_orders', ['only' => ['edit']]);
        $this->middleware('permission:delete-plan_orders', ['only' => ['destroy']]);

    }

    public function index()
    {

        $plan_orders = PlanOrder::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->get();
        return view('plan_orders.index', compact( 'plan_orders'));

    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        $plan_questions = PlanQuestion::all();
        return view('plan_orders.create', compact('plan_questions'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {

//        $rules = [
//            'plan_order_id' => 'required',
//            'time' => 'required|date',
//            'worker' => 'required',
//            'service' => 'required',
//        ];
//
//        $messages = [
//            'plan_order_id.required' => 'Yoxlamanın nömrəsi vacibdir.',
//            'time.required' => 'Yoxlamanın tarixi vacibdir.',
//            'time.date' => 'Tarix düzgün formatda deyil.',
//            'worker.required' => 'Yoxlanılan əməkdaş vacibdir.',
//            'service.required' => 'Xidmətin növü vacibdir.',
//        ];
//
//        $validatedData = $request->validate($rules, $messages);

        $planOrder = new PlanOrder();
        $planOrder->plan_order_id = $request->input('plan_order_id');
        $planOrder->time = $request->input('time');
        $planOrder->worker = $request->input('worker');
        $planOrder->service = $request->input('service');
        $planOrder->user_id = auth()->user()->id;
        $planOrder->save();

        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'answer') === 0 && $value != null) {
                $index = substr($key, 6);
                $planOrder->planQuestions()->attach($request->input('question_id' . $index), [
                    'answer' => $value,
                    'comment' => $request->input('comment' . $index)
                ]);
            }
        }

        return redirect()->route('plan_orders.index')->with('success', 'Yoxlama məlumatları uğurla əlavə edildi.');
    }


    /**
     * Display the specified resource.
     */

    public function show(PlanOrder $PlanOrderRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(PlanOrder $plan_order)
    {
        $plan_questions = PlanQuestion::all();
        return view('plan_orders.edit', compact('plan_order','plan_questions'));

    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {
//            dd($request->all());
//        $rules = [
//            'plan_order_id' => 'required',
//            'time' => 'required|date',
//            'worker' => 'required',
//            'service' => 'required',
//        ];
//
//        $messages = [
//            'plan_order_id.required' => 'Yoxlamanın nömrəsi vacibdir.',
//            'time.required' => 'Yoxlamanın tarixi vacibdir.',
//            'time.date' => 'Tarix düzgün formatda deyil.',
//            'worker.required' => 'Yoxlanılan əməkdaş vacibdir.',
//            'service.required' => 'Xidmətin növü vacibdir.',
//        ];

//        $validatedData = $request->validate($rules, $messages);

        $planOrder = PlanOrder::findOrFail($id);


        $planOrder->plan_order_id = $request->input('plan_order_id');
        $planOrder->time = $request->input('time');
        $planOrder->worker = $request->input('worker');
        $planOrder->service = $request->input('service');
        $planOrder->save();

        foreach ($request->question_id as $key => $question_id) {
            $answer = $request->input('answer' . $key);
            $comment = $request->input('comment' . $key);

            $comment = $comment != null ? $comment : '';

            $planOrder->planQuestions()->syncWithoutDetaching([$question_id => ['answer' => $answer, 'comment' => $comment]]);
        }

        return redirect()->back()->with('success', 'Yoxlama məlumatları uğurla yeniləndi.');
    }


    /**
     * Remove the specified resource from storage.
     */

    public function destroy(PlanOrder $plan_order)
    {

        $plan_order->delete();

        return redirect()->back()->with('message', 'Sifariş silindi.');

    }
}
