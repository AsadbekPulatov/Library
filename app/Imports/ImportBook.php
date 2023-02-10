<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;


class ImportBook implements ToModel
{

    public function model(array $row)
    {
        $arr[] = $row;
        return $arr;
    }
}
