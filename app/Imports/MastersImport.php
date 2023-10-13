<?php

namespace App\Imports;

use App\Models\Master;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
class MastersImport implements ToCollection, WithStartRow
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

            $existingData = Master::where('fin_code', $row[1])->first();
            if (!$existingData) {
                Master::create([
                    'number' => $row[0],
                    'fin_code' => $row[1],
                    'title' => $row[2],
                    'position' => $row[3],
                    'department' => $row[4],
                ]);
            }

        }

        $rowFinCodes = $rows->pluck(1)->unique()->toArray();

        $masterFinCodes = Master::pluck('fin_code')->unique()->toArray();

        $finCodesToDelete = array_diff($masterFinCodes, $rowFinCodes);

        Master::whereIn('fin_code', $finCodesToDelete)->delete();

    }


    public function startRow(): int
    {
        return 2;
    }

}
