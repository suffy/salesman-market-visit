<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\productMpm;
use App\Models\visit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;


class visitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            "query" => visit::orderBy('id', 'desc')->get(),
            "deltomed" => product::where("supp", "001")->get(),
            "us" => product::where("supp", "005")->get()
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
        // Session::flash('foto_toko', $request->foto_toko);

        $request->validate([
            'nama_toko' => 'required',
            'nama_pemilik' => 'required',
            'alamat_toko' => 'required',
            'jenis_toko' => 'required',
            'foto_toko' => 'mimes:jpeg,jpg,png,gif',
        ],[
            'nama_toko.required' => 'nama toko wajib diisi',
            'nama_pemilik.required' => 'nama_pemilik wajib diisi',
            'alamat_toko.required' => 'alamat_toko wajib diisi',
            'jenis_toko.required' => 'jenis_toko wajib diisi',
            'foto_toko.mimes' => 'foto_toko wajib sertakan dan yang diperbolehkan hanya berekstensi JPEG, JPG, PNG, GIF',
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
                'foto_toko' => $foto_baru,
                'produk_kompetitor' => $request->produk_kompetitor,
                'catatan' => $request->catatan,
            ];

            

        }else{
            $data = [
                'nama_toko' => $request->nama_toko,
                'nama_pemilik' => $request->nama_pemilik,
                'alamat_toko' => $request->alamat_toko,
                'jenis_toko' => $request->jenis_toko,
                'produk_kompetitor' => $request->produk_kompetitor,
                'catatan' => $request->catatan,
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
    public function destroy(string $id): RedirectResponse
    {
        //
    }

    public function export(){
        return Excel::download(new visit,'test.xls');
    }

}
