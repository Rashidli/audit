<?php
namespace App\Services;
use Illuminate\Support\Facades\DB;

class MixinSingle  {
    public function mixin_single($mixin_single, $orders = null)
    {


        $query = DB::table('orders')->where('deleted_at',  NULL);

        if($orders){
            $query = $orders;
        }

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

        return $query;

    }
}
