<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Master;
use App\Models\Order;
use App\Models\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;

class GroupOrderController extends Controller
{
    public function new_auditor_orders(Request $request, $id)
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

        return view('group_orders.index', compact('orders','route','group','count'));


    }

    public function worked_auditor_orders(Request $request, $id)
    {

        $group = Group::find($id);

        $limit = $request->input('limit', 10);
        $text = $request->input('text');

        $query = $group->orders()->where('auditor_status', '!=',null)
            ->where('orders.order_id', 'like', '%' . $text . '%')
            ->orderBy('id', 'desc');

        $orders = $group->orders()->where('auditor_status','!=',null )
            ->where('orders.order_id', 'like', '%' . $text . '%')
            ->orderBy('id', 'desc')
            ->paginate($limit)
            ->withQueryString();


        $count = count($query->get());

        $route = 'worked_auditor_orders';

        return view('group_orders.index', compact('orders','route','group','count'));

    }

    public function auditor_orders_edit(Order $order)
    {

        $masters = Master::all();
        $workers = Worker::all();
        return view('group_orders.edit', compact('order','masters','workers'));

    }

    public function auditor_orders_update(Request $request, Order $order)
    {

//        dd($request->request->all());

        try {

            $data = $request->except(['masters', 'workers']);
            $order->update($data);

            DB::table('master_order')->where('order_id', $order->id)->delete();
            if($request->masters){
                $masters_list = [];
                foreach ($request->masters as $master){
                    $masters_list[] = ['order_id' => $order->id, 'master_id' => $master];
                }
                DB::table('master_order')->insert($masters_list);
            }

            DB::table('order_worker')->where('order_id', $order->id)->delete();
            if($request->workers){
                $workers_list = [];
                foreach ($request->workers as $worker){
                    $workers_list[] = ['order_id' => $order->id, 'worker_id' => $worker];
                }
                DB::table('order_worker')->insert($workers_list);
            }

            DB::commit();

            return redirect()->back()->with('message', 'Məlumat update edildi.');

        }catch (\Exception $e) {

            DB::rollBack();
            return $e->getMessage();

        }





    }
}
