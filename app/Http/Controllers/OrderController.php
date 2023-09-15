<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\FileService;
use App\Services\MixinSingle;
use App\Services\SearchService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
class OrderController extends Controller
{
    public $searchService;

    public function __construct(SearchService $searchService)
    {

        $this->searchService = $searchService;
        $this->middleware('permission:list-orders|create-orders|edit-orders|delete-orders', ['only' => ['index','show']]);
        $this->middleware('permission:create-orders', ['only' => ['create','store']]);
        $this->middleware('permission:edit-orders', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-orders', ['only' => ['destroy']]);

    }

    public function index(Request $request)
    {

        $data = $this->searchService->getData($request, 'orders');

        $route = 'orders.index';

        $mixin_single = new MixinSingle();
        $single_count = $mixin_single->mixin_single('single')->where('is_new', true)->count();
//        dd($mixin_single->mixin_single('single')->where('id', 71979)->get());
        $mixin_count = $mixin_single->mixin_single('mixin')->where('is_new', true)->count();


        return view('orders.index', compact('data','route','single_count','mixin_count'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('orders.create');

    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {

        $request->validate([
            'order_id' => 'required|unique:orders',
        ]);

        Order::create($request->all());

        return redirect()->route('orders.index')->with('message', 'Sifariş əlavə edildi.');

    }

    /**
     * Display the specified resource.
     */

    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Order $order)
    {

        return view('orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Order $order)
    {

        $request->validate([
            'order_id' => 'required|unique:orders,order_id,' . $order->id,
        ]);

        $order->update($request->all());

        return redirect()->back()->with('message', 'Məlumat update edildi.');

    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Order $order)
    {

        $order->delete();

        return redirect()->back()->with('message', 'Məlumat silindi.');

    }

    public function import_excel(Request $request)
    {


        try {

            if ($request->has('file')) {
                $reader = new Xlsx();
                $spreadsheet = $reader->load($request->file);
                $worksheet = $spreadsheet->getActiveSheet();
                $worksheet_arr = $worksheet->toArray();

                // Remove header row
                unset($worksheet_arr[0]);

                foreach ($worksheet_arr as $row) {
                    // Check if the order_id already exists
                    $existingOrder = Order::where('order_id', $row[2])->first();

                    if (!$existingOrder) {
                        // If the order_id doesn't exist, create a new order
                        $order = new Order();
                        $order->order_number = $row[0];
                        $order->order_date = date("Y-m-d", strtotime($row[1]));
                        $order->order_id = $row[2];
                        $order->service_type = $row[3];
                        $order->phone_2 = $row[4];
                        $order->service_note = $row[5];
                        $order->call_date = $row[6];
                        $order->order_end_date = $row[7];
                        $order->customer_name = $row[8];
                        $order->phone = $row[9];
                        $order->corporate = $row[10];
                        $order->operator = $row[11];
                        $order->order_status = $row[12];
                        $order->oz_tutma = $row[13];
                        $order->amount = $row[14];
                        $order->driver = $row[15];
                        $order->reason_of_cancel = $row[16];
                        $order->driver_amount = $row[17] ?? 0;
                        $order->master = $row[18] ?? 0;
                        $order->worker = $row[19] ?? 0;
                        $order->additional_service = $row[20];
                        $order->department = $row[21];
                        $order->satisfaction_status = $row[22];
                        $order->address = $row[23];
                        $order->speaking_duration = $row[24];
                        $order->note = $row[25];

                        $order->save();

                    }
                }
            }

            DB::commit();

            $uploadFile = new FileService();
            $uploadFile->uploadFile($request->file, 'excels');

            return response()->json(['success'=>'You have successfully upload file.']);

        }catch (\Exception $e){

            DB::rollBack();
            return response()->json(['error'=>$e->getMessage()]);

        }

    }

}
