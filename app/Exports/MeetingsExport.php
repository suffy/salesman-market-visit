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
        if (Auth::user()->email == 'suffy.yanuar@gmail.com' 
            || Auth::user()->email == 'suffy.mpm@gmail.com'
            || Auth::user()->email == 'fardison.juntak@gmail.com'
            || Auth::user()->email == 'junius.prasetyo05@gmail.com'
            || Auth::user()->email == 'hermanoscar2017@gmail.com'
            || Auth::user()->email == 'igede.iw@gmail.com'
            || Auth::user()->email == 'yayangtjoa2@gmail.com'
            || Auth::user()->email == 'hwiryanto@gmail.com'
        ) {
            return view('beranda.meeting.exports.meeting', [
                'meeting' => Meeting::get()
            ]);
        }else{
            return view('beranda.meeting.exports.meeting', [
                'meeting' => Meeting::where('created_by_email', Auth::user()->email)->get()
            ]);
        }
    }
}
