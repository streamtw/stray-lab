<?php

namespace App\Imports;

use App\Registration;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithProgressBar;

class RegistrationsImport implements ToModel, WithProgressBar
{
    use Importable;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // 跳過 heading
        if ($row[0] === '統一編號') {
            return;
        }

        return new Registration([
            'tax_number' => $row[0],
            'name' => $row[1],
            'address' => $row[2],
            'status' => $row[3],
        ]);
    }
}
