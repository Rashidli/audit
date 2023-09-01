<?php

namespace App\Http\Controllers;

use App\Models\Act;
use App\Models\Customer;
use App\Models\Group;
use App\Models\Meeting;
use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

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

        $customer_count = Customer::all()->count();
        return view('home',compact('customer_count'));

    }

    public function share_orders()
    {

        $groups = Group::all();
        $orders_count = Order::where('is_new', true)->count();
        return view('orders.share_orders',compact('groups','orders_count'));

    }

}
