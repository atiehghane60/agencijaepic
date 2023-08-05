<?php

namespace App\Imports;

use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class ActivityImport implements ToModel, WithCustomCsvSettings
{

    use Importable;

    public function model(array $row)
    {
        $activity = [
            'name' => $row[0],
            'appointments' => []
        ];
        for ($i = 1; $i < count($row); $i++)
            $activity['appointments'][] = $row[$i];

        return $activity;
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';'
        ];
    }
}
