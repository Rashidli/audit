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

        if($is_new != null){
            $query->where('is_new', $is_new);
        }
        if($date){
            $query->whereDate('order_date', '=', $date);
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
        $data = $query->orderBy('id', 'desc')->paginate($limit)->withQueryString();

        return ['items' => $data, 'count' => $count];


    }
}
