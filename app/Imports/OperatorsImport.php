<?php

namespace App\Imports;

use App\Models\Operator;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class OperatorsImport implements ToCollection, WithStartRow
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

            $existingData = Operator::where('fin_code', $row[1])->first();
            if (!$existingData) {
                Operator::create([
                    'fin_code' => $row[0],
                    'title' => $row[1],
                    'position' => $row[2],
                ]);
            }

        }

        $rowFinCodes = $rows->pluck(1)->unique()->toArray();

        $masterFinCodes = Operator::pluck('fin_code')->unique()->toArray();

        $finCodesToDelete = array_diff($masterFinCodes, $rowFinCodes);

        Operator::whereIn('fin_code', $finCodesToDelete)->delete();

    }

    public function startRow(): int
    {
        return 2;
    }
}
