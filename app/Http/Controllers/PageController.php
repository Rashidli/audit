<?php

namespace App\Http\Controllers;

use App\Models\Act;
use App\Models\Customer;
use App\Models\Group;
use App\Models\Meeting;
use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use App\Services\SearchService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

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


        $customer_count = Order::where('is_new', true)->count();
        return view('home',compact('customer_count'));

    }

    public function share_orders()
    {

        $groups = Group::with('orders')->get();
//        dd($groups);
        $orders_count = Order::where('is_new', true)->count();
        return view('orders.share_orders',compact('groups','orders_count'));

    }

    public function group_orders(Request $request, $id)
    {

        $group = Group::find($id);

        $limit = $request->input('limit', 10);
        $text = $request->input('text');
        $orders = $group->orders()
            ->where('orders.order_number', 'like', '%' . $text . '%')
            ->orderBy('id', 'desc')
            ->paginate($limit)
            ->withQueryString();

        $count = $group->orders()->count();

        $route = 'group_orders';

        return view('orders.group_orders', compact('orders','route','group','count'));


    }

}
