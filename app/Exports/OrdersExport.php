<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
class OrdersExport implements FromCollection,WithHeadings
{

    use Exportable;

//    public function query()
//    {
//        return Order::query()
//            ->where('auditor_status', true)
//            ->where('is_new', false)
//            ->select('order_number','order_id','order_date')
//            ->with('masters', 'workers', 'questions');
//    }
//
//    public function map($order): array
//    {
//        return[
//            $order->order_number,
//            $order->order_id,
//            $order->order_date,
//            $order->masters->pluck('title')->implode(', '),
//            $order->workers->pluck('title')->implode(', '),
//            $order->questions->pluck('title')->implode(', '),
//        ];
//    }

    public function collection()
    {

        $orders = Order::where('auditor_status', true)
            ->where('is_new', false)
            ->with('masters', 'workers','questions')->get();

        $data = [];

        foreach ($orders as $order) {
            $masterNames = $order->masters->pluck('title')->implode(', ');
            $workerNames = $order->workers->pluck('title')->implode(', ');
            $questionNames = $order->questions->pluck('title')->implode(', ');

            $data[] = [
                '#' => $order->order_number,
                'Order id' => $order->order_id,
                'Order date' => $order->order_date,
                'Service type' => $order->service_type,
                'Operator' => $order->operator,
                'Driver' => $order->driver,
                'Master Names' => $masterNames,
                'Worker Names' => $workerNames,
                'Questions' => $questionNames,
                'Worker count' => $order->worker_count,
                'Master count' => $order->master_count,
                'Car number' => $order->car_number,
                'Address' => $order->address,
                'Auditor' => $order->auditor_name,
                'Auditor note' => $order->auditor_note,
                'Amount' => $order->amount,
                'Driver amount' => $order->driver_amount,
                'Master amount' => $order->master,
                'Worker amount' => $order->worker,
                'Corporate' => $order->corporate,
                'Service note' => $order->service_note,
                'Customer' => $order->customer_name,
                'Order end date' => $order->order_end_date,
            ];
        }

        return collect($data);

    }

    public function headings(): array
    {
        return [
            '#',
            'Sifariş id',
            'Sifariş tarixi',
            'Xidmət növü',
            'Operator',
            'Sürücü',
            'Ustalar',
            'Fəhlələr',
            'Suallar',
            'Fəhlə sayı',
            'Usta sayı',
            'Maşın nömrəsi',
            'Ünvan',
            'Auditor',
            'Auditor qeydi',
            'Məbləğ',
            'Sürücü məbləği',
            'Usta məbləği',
            'Fəhlə məbləği',
            'Korporativ',
            'Sifariş qeydi',
            'Müştəri',
            'Sifarişin bitmə tarixi',
        ];
    }


//    public function headings(): array
//    {
//        return [
//            '#',
//            'Order id',
//            'Order date',
//        ];
//    }

}
