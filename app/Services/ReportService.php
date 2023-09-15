<?php
namespace App\Services;
use App\Models\Order;
use Illuminate\Support\Facades\Schema;

class ReportService{

    public function filter($request)
    {
        $limit = $request->input('limit', 10);
        $mixin_single = $request->input('mixin_single');
        $auditor_status = $request->input('auditor_status');
        $order_status = $request->input('order_status');
        $group_id = $request->input('group_id');
        $auditor_title = $request->input('auditor_title');
        $text = $request->input('text');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $table = 'orders';

        $query =Order::whereNull('deleted_at')->where('is_new', false);

        if($start_date || $end_date){

            $query->where('updated_at', '>=', $start_date .' 00:00:00')->where('updated_at','<=', $end_date .' 23:59:59');

        }

        if($mixin_single){
            if($mixin_single == 'single'){

                $query->where(function ($q){
                    $q
                        ->orWhere([['worker','=',0],['master','=',0],['driver_amount','=',0]])
                        ->orWhere([['worker','>',0],['master','=',0],['driver_amount','=',0]])
                        ->orWhere([['worker','=',0],['master','>',0],['driver_amount','=',0]])
                        ->orWhere([['worker','=',0],['master','=',0],['driver_amount','>',0]]);
                });

            }elseif ($mixin_single == 'mixin'){
                $query->where(function ($q){

                    $q
                        ->orWhere([['worker','>',0],['master','>',0],['driver_amount','>',0]])
                        ->orWhere([['worker','>',0],['master','>',0],['driver_amount','=',0]])
                        ->orWhere([['worker','=',0],['master','>',0],['driver_amount','>',0]])
                        ->orWhere([['worker','>',0],['master','=',0],['driver_amount','>',0]]);
                });
            }
        }

        if($order_status){
            $query->where('auditor_status', $order_status);
        }

        if($auditor_title){
            $query->where('auditor_name', $auditor_title);
        }


        if($auditor_status){
            if($auditor_status == 'is_null'){
                $query->whereNull('auditor_status');
            }elseif ($auditor_status == 'not_null'){
                $query->whereNotNull('auditor_status');
            }
        }

        if($group_id){
            $query->whereHas('groups',function($q) use ($group_id){
                $q->where('groups.id',$group_id);
            });
        }

        if ($text) {

            $query->where(function ($query) use ($text, $table) {
                $columns = Schema::getColumnListing($table);

                foreach ($columns as $column) {
                    $query->orWhere($column, 'LIKE', '%' . $text . '%');
                }
            });

        }

        $count = count($query->get());
        $orders = $query->orderBy('id', 'desc')->paginate($limit)->withQueryString();

        return ['items' => $orders, 'count' => $count];

    }

}
