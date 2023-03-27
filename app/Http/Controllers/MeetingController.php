<?php

namespace App\Http\Controllers;

use App\Exports\MeetingsExport;
use App\Models\Meeting;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
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
            $data = [
                "query" => Meeting::orderBy('id', 'desc')->get(),
            ];
        }else{
            $data = [
                "query" => Meeting::where('created_by_email', Auth::user()->email)->orderBy('id', 'desc')->get(),
            ];
        }
        return view('beranda.meeting.index')->with("data", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('tgl_meeting', $request->tgl_meeting);
        Session::flash('tgl_meeting_selesai', $request->tgl_meeting_selesai);
        Session::flash('jenis', $request->jenis);
        Session::flash('keterangan', $request->keterangan);

        $response = Http::get('https://api.bigdatacloud.net/data/reverse-geocode-client?latitude=' . $request->latitude . '&longitude=' . $request->longitude . '&localityLanguage=en')->json();

        $city = $response['city'];
        $locality = $response['locality'];
        $principalSubdivision = $response['principalSubdivision'];

        $request->validate([
            'tgl_meeting' => 'required',
            'tgl_meeting_selesai' => 'required',
            'jenis' => 'required',
            'keterangan' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'
        ], [
            'tgl_meeting.required' => 'tanggal meeting (Mulai) wajib diisi',
            'tgl_meeting_selesai.required' => 'tanggal meeting (Selesai) wajib diisi',
            'jenis.required' => 'jenis wajib diisi',
            'keterangan.required' => 'keterangan wajib diisi',
            'latitude.required' => 'latitude wajib diisi',
            'longitude.required' => 'longitude wajib diisi'
        ]);

        $data = [
            'tgl_meeting' => $request->tgl_meeting,
            'tgl_meeting_selesai' => $request->tgl_meeting_selesai,
            'jenis' => $request->jenis,
            'keterangan' => $request->keterangan,
            'created_by'    => Auth::user()->name,
            'created_by_email'    => Auth::user()->email,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'provinsi' => $principalSubdivision,
            'kota' => $city,
            'kecamatan' => $locality
        ];

        $save = Meeting::create($data);
        return redirect()->route('meeting.index')->with('success', 'berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Meeting::where('id', $id)->where('created_by_email', Auth::user()->email)->first();
        return view('beranda.meeting.edit')->with("data", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tgl_meeting' => 'required',
            'tgl_meeting_selesai' => 'required',
            'jenis' => 'required',
            'keterangan' => 'required'
        ], [
            'tgl_meeting.required' => 'tanggal meeting (Mulai) wajib diisi',
            'tgl_meeting_selesai.required' => 'tanggal meeting (Selesai) wajib diisi',
            'jenis.required' => 'jenis wajib diisi',
            'keterangan.required' => 'keterangan wajib diisi'
        ]);

        $data = [
            'tgl_meeting' => $request->tgl_meeting,
            'tgl_meeting_selesai' => $request->tgl_meeting_selesai,
            'jenis' => $request->jenis,
            'keterangan' => $request->keterangan,
            'created_by'    => Auth::user()->name,
            'created_by_email'    => Auth::user()->email
        ];

        Meeting::where('id', $id)->where('created_by_email', Auth::user()->email)->update($data);
        return redirect()->route('meeting.index')->with('success', 'berhasil update data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Meeting::where('id', $id)->delete();
        return redirect()->route('meeting.index')->with('success', 'berhasil delete data');
    }

    public function export()
    {

        $date = date("Y-m-d");
        return Excel::download(new MeetingsExport, "meeting_$date.csv", \Maatwebsite\Excel\Excel::CSV);
    }

    public function export_pdf(int $id)
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
            $data = Meeting::where('id', $id)->first();
        }else{
            $data = Meeting::where('id', $id)->where('created_by_email', Auth::user()->email)->first();
        }

        $pdf = Pdf::loadView('beranda.meeting.pdf', ['data' => $data]);
        return $pdf->stream('meeting.pdf');
    }
}
