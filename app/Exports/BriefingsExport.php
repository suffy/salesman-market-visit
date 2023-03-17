<?php

namespace App\Exports;

use App\Models\Briefing;
use Maatwebsite\Excel\Concerns\FromCollection;

class BriefingsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Briefing::all();
    }
}
