<?php

namespace App\Exports;

use App\Models\Karyawan;
use Maatwebsite\Excel\Concerns\FromCollection;

class karyawanExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Karyawan::all();
    }
}
