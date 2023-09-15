<?php

namespace App\Services;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SearchService
{

    public function getData($request,$table){

        $query = DB::table($table)->where('deleted_at',  NULL);
        $limit = $request->input('limit', 10);
        $is_new = $request->input('is_new');
        $date = $request->input('date');
        $text = $request->input('text');
        $mixin_single = $request->input('mixin_single');
        $auditor_status = $request->input('auditor_status');

        if($is_new != null){
            $query->where('is_new', $is_new);
        }

        if($date){
            $query->whereDate('order_date', '=', $date);
        }

        if($auditor_status){
            if($auditor_status == 'is_null'){
                $query->whereNull('auditor_status');
            }elseif ($auditor_status == 'not_null'){
                $query->whereNotNull('auditor_status');
            }
        }

        if ($text) {

            $query->where(function ($query) use ($text, $table) {
                $columns = Schema::getColumnListing($table);

                foreach ($columns as $column) {
                    $query->orWhere($column, 'LIKE', '%' . $text . '%');
                }
            });

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

        $count = count($query->get());
        $data = $query->orderBy('id', 'desc')->paginate($limit)->withQueryString();

        return ['items' => $data, 'count' => $count];

    }
}
