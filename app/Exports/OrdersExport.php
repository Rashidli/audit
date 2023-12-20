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
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
class OrdersExport implements FromCollection,WithHeadings
{

    use Exportable;

    private $orders;

    public function __construct($orders)
    {
        $this->orders = $orders;
    }


    public function collection()
    {

        $orders = $this->orders;

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
                'Satisfied thick' => $order->satisfied_thick == 1 ? "Müştəri razıdı" : '',
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
            'Müştəri razıdı'
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
