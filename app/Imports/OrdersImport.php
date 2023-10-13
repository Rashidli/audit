<?php

namespace App\Imports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class OrdersImport implements ToModel,WithStartRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {

        return new Order([
            'order_number' => $row[0],
            'order_date' => $row[1] ? Date::excelToDateTimeObject(floatval($row[1])) : '',
            'order_id' => $row[2],
            'service_type' => $row[3],
            'phone_2' => $row[4],
            'service_note' => $row[5],
            'call_date' => $row[6] ? Date::excelToDateTimeObject(floatval($row[6])) : '',
            'order_end_date' => $row[7] ? Date::excelToDateTimeObject(floatval($row[7])) : '',
            'customer_name' => $row[8],
            'phone' => $row[9],
            'corporate' => $row[10],
            'operator' => $row[11],
            'order_status' => $row[12],
            'oz_tutma' => $row[13],
            'amount' => $row[14],
            'driver' => $row[15],
            'reason_of_cancel' => $row[16],
            'driver_amount' => $row[17] ?? 0,
            'master' => $row[18] ?? 0,
            'worker' => $row[19] ?? 0,
            'additional_service' => $row[20],
            'department' => $row[21],
            'satisfaction_status' => $row[22],
            'address' => $row[23],
            'speaking_duration' => $row[24],
            'note' => $row[25],
        ]);

    }

    public function startRow(): int
    {
        return 2;
    }
}
