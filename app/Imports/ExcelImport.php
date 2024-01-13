<?php

namespace App\Imports;

use App\Models\Danhsachlop;
use Maatwebsite\Excel\Concerns\ToModel;

class ExcelImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Danhsachlop([
            'ma_khoahoc' => $row[0],
            'mssv' => $row[1],
            'hoten' => $row[2],
            'lop' => $row[3],
            'email' => $row[4],
            'sdt' => $row[5],
        ]);
    }
}
