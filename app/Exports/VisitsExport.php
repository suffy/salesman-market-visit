<?php

namespace App\Exports;

use App\Models\visit;
use Maatwebsite\Excel\Concerns\FromCollection;

class VisitsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return visit::all();
    }
}
