<?php

namespace App\Exports;

use App\Models\Meeting;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class MeetingsExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('beranda.meeting.exports.meeting', [
            'meeting' => Meeting::where('created_by_email', Auth::user()->email)->get()
        ]);
    }
}
