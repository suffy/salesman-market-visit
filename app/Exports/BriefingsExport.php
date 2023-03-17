<?php

namespace App\Exports;

use App\Models\Briefing;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class BriefingsExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function view(): View
    {
        return view('beranda.briefing.exports.briefing', [
            'briefing' => Briefing::all()
        ]);
    }
}
