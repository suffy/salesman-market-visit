<?php

namespace App\Http\Controllers;

use App\Exports\BriefingsExport;
use App\Exports\VisitsExport;
use App\Models\Briefing;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class BriefingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            "query" => Briefing::where('created_by_email', Auth::user()->email)->orderBy('id', 'desc')->get(),
        ];
        return view('beranda.briefing.index')->with("data", $data);

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
        Session::flash('tgl_briefing', $request->tgl_briefing);
        Session::flash('jenis', $request->jenis);
        Session::flash('keterangan', $request->keterangan);

        $request->validate([
            'tgl_briefing' => 'required',
            'jenis' => 'required',
            'keterangan' => 'required'
        ],[
            'tgl_briefing.required' => 'tanggalwajib diisi',
            'jenis.required' => 'jenis wajib diisi',
            'keterangan.required' => 'keterangan wajib diisi'
        ]);

        $data = [
            'tgl_briefing' => $request->tgl_briefing,
            'jenis' => $request->jenis,
            'keterangan' => $request->keterangan,
            'created_by'    => Auth::user()->name,
            'created_by_email'    => Auth::user()->email
        ];

        $save = Briefing::create($data);
        return redirect()->route('briefing.index')->with('success', 'berhasil menambahkan data');
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
        Briefing::where('id', $id)->delete();
        return redirect()->route('briefing.index')->with('success', 'berhasil delete data');
    }

    public function export(){

        $date = date("Y-m-d");
        return Excel::download(new BriefingsExport, "briefing_$date.csv", \Maatwebsite\Excel\Excel::CSV);
    }

}
