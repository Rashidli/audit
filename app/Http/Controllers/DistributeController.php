<?php

namespace App\Http\Controllers;

use App\Services\MixinSingle;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Group;
use Illuminate\Support\Facades\DB;

class DistributeController extends Controller
{

    public function distributeNewOrders(Request $request)
    {

        $mixin_single = new MixinSingle();
        $newOrders = $mixin_single->mixin_single($request->mixin)->take($request->number)->where('is_new', true)->get();
//        dd($newOrders);

        if ($newOrders->count() == 0) {

            return redirect()->back()->with('message', 'yeni sifaris yoxdur');

        }elseif ($newOrders->count() < $request->number){

            return redirect()->back()->with('message', 'Daxil etdiyiniz say qədər yeni sifariş qalmayıb');

        }

        try {

            foreach ($newOrders as $order){

                DB::table('group_order')->insert([
                    'group_id'=>$request->group_id,
                    'order_id'=>$order->id
                ]);

                DB::table('orders')->where('id', $order->id)->update(['is_new' => false]);

            }

            DB::commit();

            return redirect()->back()->with('message','Sifarişlər paylandı');

        } catch (\Exception $e) {

            DB::rollBack();
            return $e->getMessage();

        }

    }

    public function removeOrders(Request  $request)
    {

        $group = Group::with('orders')->where('id', $request->group_id)->first();

        $mixin_single = new MixinSingle();
        $group_orders = $mixin_single->mixin_single($request->mixin, $group->orders())->take($request->number)->where('auditor_status', null)->get();

//        dd($group_orders);

//        $group_orders = $group->orders()->take($request->number)->where('auditor_status', null)->get();

        if ($group_orders->count() == 0) {

            return redirect()->back()->with('message', 'Yeni sifarişi qalmayıb.');

        }elseif ($group_orders->count() < $request->number){

            return redirect()->back()->with('message', 'Daxil etdiyiniz say qədər yeni sifariş yoxdur');

        }

        try {

            foreach ($group_orders as $group_order){

                DB::table('group_order')->where('order_id', $group_order->id)->delete();

                DB::table('orders')->where('id', $group_order->id)->update(array('is_new' => true));

            }

            DB::commit();

            return redirect()->back()->with('message','Sifarişlər silindi');

        } catch (\Exception $e) {

            DB::rollBack();
            return $e->getMessage();

        }
    }

}
