<?php

namespace App\Http\Controllers;

use App\Exports\MeetingsExport;
use App\Models\Meeting;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            "query" => Meeting::where('created_by_email', Auth::user()->email)->orderBy('id', 'desc')->get(),
        ];
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

        $request->validate([
            'tgl_meeting' => 'required',
            'tgl_meeting_selesai' => 'required',
            'jenis' => 'required',
            'keterangan' => 'required'
        ],[
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
        ],[
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

    public function export(){

        $date = date("Y-m-d");
        return Excel::download(new MeetingsExport, "meeting_$date.csv", \Maatwebsite\Excel\Excel::CSV);
    }

    public function export_pdf(int $id){
        $data = Meeting::where('id', $id)->where('created_by_email', Auth::user()->email)->first();
        $pdf = Pdf::loadView('beranda.meeting.pdf', ['data' => $data]);
        return $pdf->stream('aaaa.pdf');
    }

}
