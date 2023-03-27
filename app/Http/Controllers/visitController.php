<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Exports\VisitsExport;
use App\Models\product;
use App\Models\productMpm;
use App\Models\visit;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;

class visitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            "query" => visit::where('created_by_email', Auth::user()->email)->orderBy('id', 'desc')->get(),
            "deltomed_herbal" => product::where('supp', '001')->where('kode_group', 'G0101')->get(),
            "deltomed_candy" => product::where('supp', '001')->where('kode_group', 'G0102')->get(),
            "us" => product::where("supp", "005")->get(),
            "marguna" => product::where("supp", "002")->get(),
            "intrafood" => product::where("supp", "012")->get(),
            "strive" => product::where("supp", "013")->get(),
            "hni" => product::where("supp", "014")->get(),
            "mdj" => product::where("supp", "015")->get(),
        ];
        return view('beranda.visit.index')->with("data", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('nama_toko', $request->nama_toko);
        Session::flash('nama_pemilik', $request->nama_pemilik);
        Session::flash('alamat_toko', $request->alamat_toko);
        Session::flash('jenis_toko', $request->jenis_toko);
        Session::flash('produk_kompetitor', $request->jenis_toko);
        Session::flash('catatan', $request->jenis_toko);
        Session::flash('tgl_visit', $request->tgl_visit);
        Session::flash('catatan', $request->catatan);
        // Session::flash('foto_toko', $request->foto_toko);

        $response = Http::get('https://api.bigdatacloud.net/data/reverse-geocode-client?latitude=-6.2291164&longitude=106.6554073&localityLanguage=en')->json();

        $city = $response['city'];
        $locality = $response['locality'];
        $principalSubdivision = $response['principalSubdivision'];

        $request->validate([
            'nama_toko' => 'required',
            'nama_pemilik' => 'required',
            'alamat_toko' => 'required',
            'jenis_toko' => 'required',
            'tgl_visit' => 'required',
            'produk_kompetitor' => 'required',
            'catatan' => 'required',
            'foto_toko' => 'mimes:jpeg,jpg,png,gif',
            'latitude' => 'required',
            'longitude' => 'required',
        ],[
            'nama_toko.required' => 'nama toko wajib diisi',
            'nama_pemilik.required' => 'nama_pemilik wajib diisi',
            'alamat_toko.required' => 'alamat_toko wajib diisi',
            'jenis_toko.required' => 'jenis_toko wajib diisi',
            'tgl_visit.required' => 'tgl_visit wajib diisi',
            'produk_kompetitor.required' => 'produk kompetitor wajib diisi',
            'catatan.required' => 'catatan wajib diisi',
            'foto_toko.mimes' => 'foto_toko wajib sertakan dan yang diperbolehkan hanya berekstensi JPEG, JPG, PNG, GIF',
            'latitude.required' => 'latitude wajib diisi',
            'longitude.required' => 'longitude wajib diisi'
        ]);

        if ($request->hasFile('foto_toko')) {

            $foto_file = $request->file('foto_toko');
            $foto_ekstensi = $foto_file->extension();
            $foto_baru = date('ymdhis').".$foto_ekstensi";
            $foto_file->move(public_path('foto'),$foto_baru);

            $data = [
                'nama_toko' => $request->nama_toko,
                'nama_pemilik' => $request->nama_pemilik,
                'alamat_toko' => $request->alamat_toko,
                'jenis_toko' => $request->jenis_toko,
                'tgl_visit' => $request->tgl_visit,
                'foto_toko' => $foto_baru,
                'produk_kompetitor' => $request->produk_kompetitor,
                'catatan' => $request->catatan,
                'created_by'    => Auth::user()->name,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'provinsi' => $principalSubdivision,
                'kota' => $city,
                'kecamatan' => $locality,
                'created_by_email'    => Auth::user()->email
            ];

        }else{
            $data = [
                'nama_toko' => $request->nama_toko,
                'nama_pemilik' => $request->nama_pemilik,
                'alamat_toko' => $request->alamat_toko,
                'jenis_toko' => $request->jenis_toko,
                'tgl_visit' => $request->tgl_visit,
                'produk_kompetitor' => $request->produk_kompetitor,
                'catatan' => $request->catatan,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'provinsi' => $principalSubdivision,
                'kota' => $city,
                'kecamatan' => $locality,
                'created_by'    => Auth::user()->name,
                'created_by_email'    => Auth::user()->email
            ];

        }

        $save = visit::create($data);
        $id_header = $save->id;

        if ($request->deltomed) {
            foreach ($request->deltomed as $kodeprod_deltomed) {

                $deltomed = [
                    'id_ref'   => $id_header,
                    'kodeprod' => $kodeprod_deltomed
                ];

                $save = productMpm::create($deltomed);
            }
        }

        if ($request->us) {
            foreach ($request->us as $kodeprod_us) {

                $us = [
                    'id_ref'   => $id_header,
                    'kodeprod' => $kodeprod_us
                ];

                $save = productMpm::create($us);
            }
        }

        if ($request->marguna) {
            foreach ($request->marguna as $kodeprod_marguna) {

                $marguna = [
                    'id_ref'   => $id_header,
                    'kodeprod' => $kodeprod_marguna
                ];

                $save = productMpm::create($marguna);
            }
        }

        if ($request->intrafood) {
            foreach ($request->intrafood as $kodeprod_intrafood) {

                $intrafood = [
                    'id_ref'   => $id_header,
                    'kodeprod' => $kodeprod_intrafood
                ];

                $save = productMpm::create($intrafood);
            }
        }

        if ($request->strive) {
            foreach ($request->strive as $kodeprod_strive) {

                $strive = [
                    'id_ref'   => $id_header,
                    'kodeprod' => $kodeprod_strive
                ];

                $save = productMpm::create($strive);
            }
        }

        if ($request->hni) {
            foreach ($request->hni as $kodeprod_hni) {

                $hni = [
                    'id_ref'   => $id_header,
                    'kodeprod' => $kodeprod_hni
                ];

                $save = productMpm::create($hni);
            }
        }

        if ($request->mdj) {
            foreach ($request->mdj as $kodeprod_mdj) {

                $mdj = [
                    'id_ref'   => $id_header,
                    'kodeprod' => $kodeprod_mdj
                ];

                $save = productMpm::create($mdj);
            }
        }

        return redirect()->route('visit.index')->with('success', 'berhasil menambahkan data');

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
        visit::where('id', $id)->delete();
        return redirect()->route('visit.index')->with('success', 'berhasil delete data');
    }

    public function export(){

        $date = date("Y-m-d");
        return Excel::download(new VisitsExport, "visits_$date.csv", \Maatwebsite\Excel\Excel::CSV);
    }

    public function export_pdf(int $id){
        // $data = visit::where('id', $id)->where('created_by_email', Auth::user()->email)->first();
        $data = visit::query()
                ->join('product_mpm', 'product_mpm.id_ref', '=', 'visits.id')
                ->join('products', 'product_mpm.kodeprod', '=', 'products.kodeprod')
                ->select('visits.nama_toko','visits.nama_pemilik','visits.jenis_toko','visits.alamat_toko','visits.created_by','visits.tgl_visit', 'visits.foto_toko', 'visits.produk_kompetitor', 'visits.catatan', 'visits.provinsi', 'visits.kota', 'visits.kecamatan', 'product_mpm.kodeprod','products.namaprod','products.supp','products.kode_group','products.nama_group','products.kode_subgroup','products.nama_subgroup')
                ->where('created_by_email', Auth::user()->email)
                ->where('visits.id', $id)
                ->get();
        $pdf = Pdf::loadView('beranda.visit.pdf', ['data' => $data]);
        return $pdf->stream('aaaa.pdf');
    }

}
