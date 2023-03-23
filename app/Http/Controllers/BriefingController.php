<?php

namespace App\Http\Controllers;

use App\Models\Briefing;
use Illuminate\Http\Request;
use App\Exports\VisitsExport;
use Illuminate\Http\Response;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\BriefingsExport;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Stevebauman\Location\Facades\Location;
use Stevebauman\Location\Location as LocationLocation;

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
    public function edit(int $id)
    {   
        $data = Briefing::where('id', $id)->where('created_by_email', Auth::user()->email)->first();
        return view('beranda.briefing.edit')->with("data", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
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

        Briefing::where('id', $id)->where('created_by_email', Auth::user()->email)->update($data);
        return redirect()->route('briefing.index')->with('success', 'berhasil update data');
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

    public function export_pdf(int $id){
        $data = Briefing::where('id', $id)->where('created_by_email', Auth::user()->email)->first();
        $pdf = Pdf::loadView('beranda.briefing.pdf', ['data' => $data]);
        return $pdf->stream('aaaa.pdf');
    }

    public function location(Request $request){

        // dd(Location::get('103.85.150.65'));
        // if ($position = Location::get()) {
        //     // Successfully retrieved position.
        //     echo $position->countryName;
        // } else {
        //     // Failed retrieving position.
        // }


        // $userIP = $request->ip();
        $userIP = $_SERVER['REMOTE_ADDR'];
        // dd($userIP);


        $location = Location::get($userIP);

        dd($location);

    }

}
