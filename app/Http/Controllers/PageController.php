<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Group;
use App\Models\Master;
use App\Models\Operator;
use App\Models\Order;
use App\Models\Question;
use App\Models\QuestionCat;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Services\MixinSingle;
class PageController extends Controller
{

    public function login()
    {

        return view('login');

    }

    public function register()
    {
        return view('register');
    }

    public function home()
    {

        $customer_count = Order::all()->count();
        return view('home',compact('customer_count'));

    }

    public function share_orders($mixin)
    {

        $orders_count = 0;
        $mixin_single = new MixinSingle();

        if($mixin == 'single'){

            $orders_count = $mixin_single->mixin_single('single')->where('is_new', true)->count();

        }elseif ($mixin == 'mixin'){

            $orders_count = $mixin_single->mixin_single('mixin')->where('is_new', true)->count();

        }

        $groups = Group::with('orders')->get();

        return view('orders.share_orders',compact('groups','orders_count','mixin'));

    }

    public function new_group_orders(Request $request, $id)
    {

        $group = Group::find($id);

        $limit = $request->input('limit', 10);
        $text = $request->input('text');

        $query = $group->orders()->where('auditor_status', false)
            ->where('orders.order_id', 'like', '%' . $text . '%')
            ->orderBy('id', 'desc');

        $orders = $group->orders()->where('auditor_status', false)
            ->where('orders.order_id', 'like', '%' . $text . '%')
            ->orderBy('id', 'desc')
            ->paginate($limit)
            ->withQueryString();

        $count = count($query->get());

        $route = 'group_orders';

        return view('orders.group_orders', compact('orders','route','group','count'));

    }

    public function worked_group_orders(Request $request, $id)
    {
        $group = Group::find($id);

        $limit = $request->input('limit', 10);
        $text = $request->input('text');

        $query = $group->orders()->where('auditor_status', true)
            ->where('orders.order_id', 'like', '%' . $text . '%')
            ->orderBy('id', 'desc');

        $orders = $group->orders()->where('auditor_status', '!=' ,true)
            ->where('orders.order_id', 'like', '%' . $text . '%')
            ->orderBy('id', 'desc')
            ->paginate($limit)
            ->withQueryString();

        $count = count($query->get());

        $route = 'worked_group_orders';

        return view('orders.group_orders', compact('orders','route','group','count'));
    }

    public function order_status(Request $request, $auditor_status = null)
    {
        if (isset($auditor_status)) {
            $query = Order::with('questions')
                ->where('auditor_status', true)
                ->where('is_new', false)
                ->whereHas('questions', function ($q) use ($auditor_status) {
                    $q->where('level', $auditor_status)->where('answer', false)->withTrashed();
                });
        } else {
            $query = Order::doesntHave('questions')
                ->where('auditor_status', true)
                ->where('auditor_note', '!=', null)
                ->where('satisfied_thick', false);
        }

        $limit = $request->input('limit', 10);
        $text = $request->input('text');
        $table = 'orders';

        if ($text) {
            $query->where(function ($query) use ($text, $table) {
                $columns = Schema::getColumnListing($table);

                foreach ($columns as $column) {
                    $query->orWhere($column, 'LIKE', '%' . $text . '%');
                }
            });
        }
        $route =  $auditor_status;
        $count = $query->count();

        $orders = $query->orderBy('id', 'desc')->paginate($limit)->withQueryString();

        return view('order_status.index', compact('orders', 'route', 'count'));
    }


    public function satisfied_customers(Request $request)
    {

        $query = Order::where(function ($query) {
            $query->whereHas('questions', function ($subQuery) {
                $subQuery->where('answer', false)->withTrashed();
            })
                ->orWhereDoesntHave('questions');
        })->where([['auditor_status', true], ['satisfied_thick', true]]);

        $limit = $request->input('limit', 10);
        $text = $request->input('text');
        $table = 'orders';

        if ($text) {

            $query->where(function ($query) use ($text, $table) {
                $columns = Schema::getColumnListing($table);

                foreach ($columns as $column) {
                    $query->orWhere($column, 'LIKE', '%' . $text . '%');
                }
            });

        }

        $route =  'satisfied_customers';

        $count = count($query->get());
        $orders = $query->orderBy('id', 'desc')->paginate($limit)->withQueryString();

        return view('order_status.satisfied_customers', compact('orders','route','count'));

    }

    public function satisfied_customers_edit($id)
    {


        $order = Order::withTrashed()
            ->with(['questions' => function ($q)  {
                $q->withTrashed();
            }])
            ->with('images')
            ->with(['masters' => function ($q) {
                $q->withTrashed();
            }])
            ->with(['workers' => function ($q) {
                $q->withTrashed();
            }])
            ->findOrFail($id);

        $question_cats = QuestionCat::with(['questions' => function ($q) {
            $q->withTrashed();
        }])->get();

        $masters = Master::withTrashed()->get();

        $workers = Worker::withTrashed()->get();
        $operators = Operator::withTrashed()->get();
        $drivers = Driver::withTrashed()->get();

        return view('order_status.satisfied_customers_edit', compact('order','masters','workers','question_cats','operators','drivers'));

    }

    public function satisfied_customers_update(Request $request, Order $order)
    {
//        dd($request->all());
        $order->update($request->all());
        return redirect()->back()->with('message', 'Məlumat update edildi.');
    }

    public function edit_order_status(Request $request)
    {

        $level_id = $request->level_id;

        $order = Order::withTrashed()
            ->with(['questions' => function ($q) use ($level_id) {
                $q->withTrashed()->where('level', $level_id);
            }])
            ->with('images')
            ->with(['masters' => function ($q) {
                $q->withTrashed();
            }])
            ->with(['workers' => function ($q) {
                $q->withTrashed();
            }])
            ->findOrFail($request->id);

        $question_cats = QuestionCat::with(['questions' => function ($q) {
            $q->withTrashed();
        }])->get();

        $masters = Master::withTrashed()->get();

        $workers = Worker::withTrashed()->get();

        $drivers = Driver::withTrashed()->get();
        $operators = Operator::withTrashed()->get();

        return view('order_status.edit', compact('order','masters','workers','question_cats','level_id','drivers','operators'));

    }

    public function update_order_status(Request $request, Order $order)
    {

        dd($request->all());
        $order->update($request->all());
        return redirect()->back()->with('message', 'Məlumat update edildi.');

    }

}
