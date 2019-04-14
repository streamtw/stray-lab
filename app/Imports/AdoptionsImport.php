<?php

namespace App\Imports;

use App\Adoption;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithProgressBar;

class AdoptionsImport implements ToModel, WithProgressBar
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
        if ($row[0] === 'animal_id') {
            return;
        }

        $columns = [
            'animal_id', 'animal_subid', 'animal_area_pkid', 'animal_shelter_pkid', 'animal_place', 'animal_kind', 'animal_sex', 'animal_bodytype', 'animal_colour', 'animal_age', 'animal_sterilization', 'animal_bacterin', 'animal_foundplace', 'animal_title', 'animal_status', 'animal_remark', 'animal_caption', 'animal_opendate', 'animal_closeddate', 'animal_update', 'animal_createtime', 'shelter_name', 'album_file', 'album_update', 'cDate', 'shelter_address', 'shelter_tel'
        ];

        $columnMapping = [];

        foreach ($columns as $index => $column) {
            $columnMapping[$column] = $row[$index];
        }

        return new Adoption($columnMapping);
    }
}
