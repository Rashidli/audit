<?php

namespace App\Imports;

use App\Models\Driver;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class DriversImport implements ToCollection, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */


    public function collection(Collection $rows)
    {

        foreach ($rows as $row)
        {

            $existingData = Driver::where('fin_code', $row[1])->first();
            if (!$existingData) {
                Driver::create([
                    'number' => $row[0],
                    'fin_code' => $row[1],
                    'title' => $row[2],
                    'position' => $row[3],
                    'department' => $row[4],
                ]);
            }
        }

        $rowFinCodes = $rows->pluck(1)->unique()->toArray();

        $masterFinCodes = Driver::pluck('fin_code')->unique()->toArray();

        $finCodesToDelete = array_diff($masterFinCodes, $rowFinCodes);

        Driver::whereIn('fin_code', $finCodesToDelete)->delete();

    }

    public function startRow(): int
    {
        return 2;
    }


}

