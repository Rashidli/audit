<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Order;
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

        $query = $group->orders()->where('auditor_status', null)
            ->where('orders.order_id', 'like', '%' . $text . '%')
            ->orderBy('id', 'desc');

        $orders = $group->orders()->where('auditor_status', null)
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

        $query = $group->orders()->where('auditor_status', '!=' ,null)
            ->where('orders.order_id', 'like', '%' . $text . '%')
            ->orderBy('id', 'desc');

        $orders = $group->orders()->where('auditor_status', '!=' ,null)
            ->where('orders.order_id', 'like', '%' . $text . '%')
            ->orderBy('id', 'desc')
            ->paginate($limit)
            ->withQueryString();

        $count = count($query->get());

        $route = 'worked_group_orders';

        return view('orders.group_orders', compact('orders','route','group','count'));
    }

    public function order_status(Request $request, $auditor_status)
    {

        $query = DB::table('orders')->where([['deleted_at', '=',  NULL ], ['auditor_status', '=', $auditor_status]]);

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

        $count = count($query->get());
        $orders = $query->orderBy('id', 'desc')->paginate($limit)->withQueryString();

        return view('order_status.index', compact('orders','route','count'));

    }

    public function edit_order_status(Order $order)
    {

        return view('order_status.edit', compact('order'));

    }

    public function update_order_status(Request $request,Order $order)
    {
        $order->update($request->all());

        return redirect()->back()->with('message', 'Məlumat update edildi.');
    }

}
