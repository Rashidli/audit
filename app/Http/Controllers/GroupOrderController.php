<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Group;
use App\Models\Master;
use App\Models\Operator;
use App\Models\Order;
use App\Models\QuestionCat;
use App\Models\Worker;
use App\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class GroupOrderController extends Controller
{

    public function evakuasiya_create_order()
    {

        $question_cats = QuestionCat::with('questions')
            ->whereNotIn('id', [3, 4])
            ->get();

        $groups = Group::all();
        $drivers = Driver::all();
        $operators = Operator::all();
        return view('group_orders.evakuasiya_create', compact('question_cats','groups','drivers','operators'));

    }

    public function auditor_create_order()
    {

        $question_cats = QuestionCat::with('questions')
            ->whereNotIn('id', [8])
            ->get();

        $masters = Master::all();
        $workers = Worker::all();
        $groups = Group::all();
        $drivers = Driver::all();
        $operators = Operator::all();

        return view('group_orders.create', compact('question_cats','masters','workers','groups','drivers','operators'));

    }

    public function auditor_store_order(Request $request)
    {

        DB::beginTransaction();
        try {

            $data = $request->except(['worker','master','driver_amount','masters', 'workers', 'auditor_name','auditor_images','answers','worker_thick','master_thick','worker_thick','operator_thick','custom_input_operator','custom_input_worker','custom_input_master','custom_input_driver','satisfied_thick','custom_input_satisfied','is_completed_evacuation']);

            if(empty($request->worker)){
                $data['worker'] = 0;
            }else{
                $data['worker'] = $request->worker;
            }
            if(empty($request->master)){
                $data['master'] = 0;
            }else{
                $data['master'] = $request->master;
            }
            if(empty($request->driver_amount)){
                $data['driver_amount'] = 0;
            }else{
                $data['driver_amount'] = $request->driver_amount;
            }

            $data['is_completed_evacuation'] = isset($request->is_completed_evacuation);

            if(empty($request->worker_thick)){
                $data['worker_thick'] = $request->custom_input_worker;
            }else{
                $data['worker_thick'] = $request->worker_thick;
            }

            if(empty($request->master_thick)){
                $data['master_thick'] = $request->custom_input_master;
            }else{
                $data['master_thick'] = $request->master_thick;
            }

            if(empty($request->driver_thick)){
                $data['driver_thick'] = $request->custom_input_driver;
            }else{
                $data['driver_thick'] = $request->driver_thick;
            }

            if(empty($request->operator_thick)){
                $data['operator_thick'] = $request->custom_input_operator;
            }else{
                $data['operator_thick'] = $request->operator_thick;
            }

            if(empty($request->satisfied_thick)){
                $data['satisfied_thick'] = $request->custom_input_satisfied;
            }else{
                $data['satisfied_thick'] = $request->satisfied_thick;
            }

            $data['auditor_name'] = auth()->user()->name;

            $order  = Order::create($data);

            DB::table('order_question')->where('order_id', $order->id)->delete();

            if($request->answers){
                $answers_list = [];
                foreach ($request->answers as $key => $answer){
                    $answers_list[] = ['order_id' => $order->id, 'question_id' => $key, 'answer' => $answer];
                }
                DB::table('order_question')->insert($answers_list);
            }

            if($request->masters){
                $masters_list = [];
                foreach ($request->masters as $master){
                    $masters_list[] = ['order_id' => $order->id, 'master_id' => $master];
                }
                DB::table('master_order')->insert($masters_list);
            }

            if($request->workers){
                $workers_list = [];
                foreach ($request->workers as $worker){
                    $workers_list[] = ['order_id' => $order->id, 'worker_id' => $worker];
                }
                DB::table('order_worker')->insert($workers_list);
            }

            if($request->auditor_images){
                $auditor_images = [];
                foreach ($request->auditor_images as $image){
                    $file = new FileService();
                    $file_name = $file->uploadFile($image,'images');
                    $auditor_images[] = ['order_id' => $order->id, 'file' => $file_name];
                }
                DB::table('order_images')->insert($auditor_images);
            }

            DB::table('group_order')->insert([
                'order_id' => $order->id,
                'group_id' => auth()->user()->group_id
            ]);

            DB::commit();

            return redirect()->back()->with('message', 'Sifariş yaradıldı.');

        }catch (\Exception $e) {

            DB::rollBack();
            return $e->getMessage();

        }
    }
    public function new_auditor_orders(Request $request, $id)
    {

        $group = Group::find($id);
        $group_id = $group->id;
        $today = Carbon::today();

        $query = Order::where('auditor_status', false)
            ->whereDate('orders.created_at', '=', $today)
            ->whereHas('groups', function ($q) use ($group_id){
                $q->where('group_id', $group_id);
            });


        $order_id = $request->input('order_id');
        $address = $request->input('address');
        $driver_name = $request->input('driver_name');
        $limit = $request->input('limit', 10);

        if($order_id){
            $query->where('order_id', 'like', '%' . $order_id . '%');
        }

        if($address){
            $query->where('address', 'like', '%' . $address . '%');
        }

        if($driver_name){
            $query->where('driver', 'like', '%' . $driver_name. '%');
        }

        $orders = $query->orderBy('id', 'desc')
        ->paginate($limit)
        ->withQueryString();


        $count = $orders->total();

        $route = 'auditor_orders';

        return view('group_orders.index', compact('orders','route','group','count'));

    }

    public function worked_auditor_orders(Request $request, $id)
    {


        $group = Group::find($id);

        $limit = $request->input('limit', 10);
        $text = $request->input('text');
        $today = Carbon::today();

        $query = $group->orders()->where('auditor_status', true)
            ->whereDate('orders.created_at', '=', $today)
            ->where('orders.order_id', 'like', '%' . $text . '%')
            ->orderBy('orders.id', 'desc');

        $orders = $query->paginate($limit)->withQueryString();

        $count = $query->count();

        $route = 'worked_auditor_orders';

        return view('group_orders.index', compact('orders', 'route', 'group', 'count'));


    }

    public function auditor_orders_edit($id)
    {

        $order = Order::with('images','questions')->findOrFail($id);
        $question_cats = QuestionCat::with('questions')->get();

        $masters = Master::all();
        $workers = Worker::all();

        return view('group_orders.edit', compact('order','masters','workers','question_cats'));

    }

    public function auditor_orders_update(Request $request, Order $order)
    {

        DB::beginTransaction();

        try {

            $data = $request->except(['masters', 'workers', 'auditor_name','auditor_images','answers','worker_thick','master_thick','worker_thick','operator_thick','custom_input_operator','custom_input_worker','custom_input_master','custom_input_driver','satisfied_thick','custom_input_satisfied','is_completed_evacuation']);

            if(empty($request->worker_thick)){
                $data['worker_thick'] = $request->custom_input_worker;
            }else{
                $data['worker_thick'] = $request->worker_thick;
            }

            if(empty($request->master_thick)){
                $data['master_thick'] = $request->custom_input_master;
            }else{
                $data['master_thick'] = $request->master_thick;
            }

            if(empty($request->driver_thick)){
                $data['driver_thick'] = $request->custom_input_driver;
            }else{
                $data['driver_thick'] = $request->driver_thick;
            }

            $data['is_completed_evacuation'] = isset($request->is_completed_evacuation);

            if(empty($request->operator_thick)){
                $data['operator_thick'] = $request->custom_input_operator;
            }else{
                $data['operator_thick'] = $request->operator_thick;
            }
            if(empty($request->satisfied_thick)){
                $data['satisfied_thick'] = $request->custom_input_satisfied;
            }else{
                $data['satisfied_thick'] = $request->satisfied_thick;
            }
            if(auth()->user()->name !== 'Admin'){
                $data['auditor_name'] = auth()->user()->name;
            }

            $order->update($data);

            DB::table('order_question')->where('order_id', $order->id)->delete();

            if($request->answers){
                $answers_list = [];
                foreach ($request->answers as $key => $answer){
                    $answers_list[] = ['order_id' => $order->id, 'question_id' => $key, 'answer' => $answer];
                }
                DB::table('order_question')->insert($answers_list);
            }

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

//            DB::table('order_images')->where('order_id', $order->id)->delete();
            if($request->auditor_images){
                $auditor_images = [];
                foreach ($request->auditor_images as $image){
                    $file = new FileService();
                    $file_name = $file->uploadFile($image,'images');
                    $auditor_images[] = ['order_id' => $order->id, 'file' => $file_name];
                }
                DB::table('order_images')->insert($auditor_images);
            }

            DB::commit();

            return redirect()->back()->with('message', 'Məlumat update edildi.');

        }catch (\Exception $e) {

            DB::rollBack();
            return $e->getMessage();

        }



    }
}
