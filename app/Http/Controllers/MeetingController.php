<?php

namespace App\Http\Controllers;

use App\Exports\MeetingsExport;
use App\Models\Meeting;
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
        Session::flash('jenis', $request->jenis);
        Session::flash('keterangan', $request->keterangan);

        $request->validate([
            'tgl_meeting' => 'required',
            'jenis' => 'required',
            'keterangan' => 'required'
        ],[
            'tgl_meeting.required' => 'tanggal meeting wajib diisi',
            'jenis.required' => 'jenis wajib diisi',
            'keterangan.required' => 'keterangan wajib diisi'
        ]);

        $data = [
            'tgl_meeting' => $request->tgl_meeting,
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
    public function edit(string $id): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        //
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

}
