<?php

namespace App\Http\Controllers;

use App\Models\riwayat;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

class experienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    function __construct()
    {
        $this->_tipe = 'experience';
    }

    public function index()
    {
        $data = riwayat::where('tipe', $this->_tipe)->orderBy('tgl_akhir','desc')->get(); 
        return view('dashboard.experience.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.experience.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('judul', $request->judul);
        Session::flash('info1', $request->info1);
        Session::flash('tgl_mulai', $request->tgl_mulai);
        Session::flash('tgl_akhir', $request->tgl_akhir);
        Session::flash('isi', $request->isi);
        $request->validate([
            'judul' => 'required',
            'info1' => 'required',
            'tgl_mulai' => 'required',
            'isi' => 'required',
        ],[
            'judul.required' => 'Judul wajib diisi',
            'info1.required' => 'Nama Perusahaan wajib diisi',
            'tgl_mulai.required' => 'Tanggal mulai wajib diisi',
            'isi.required' => 'Isian tulisan wajib diisi',
        ]);

        $data = [
            'judul' => $request->judul,
            'info1' => $request->info1,
            'tipe' => $this->_tipe,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_akhir' => $request->tgl_akhir,
            'isi'   => $request->isi,
        ];

        riwayat::create($data);

        return redirect()->route('experience.index')->with('success','berhasil menambahkan data experience');
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
        $data = riwayat::where('id', $id)->where('tipe', $this->_tipe)->first();
        return view('dashboard.experience.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required',
            'info1' => 'required',
            'tgl_mulai' => 'required',
            'isi' => 'required',
        ],[
            'judul.required' => 'Judul wajib diisi',
            'isi.required' => 'Isian tulisan wajib diisi',
        ]);

        $data = [
            'judul' => $request->judul,
            'info1' => $request->info1,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_akhir' => $request->tgl_akhir,
            'isi'   => $request->isi,
        ];

        riwayat::where('id', $id)->update($data);

        return redirect()->route('experience.index')->with('success','berhasil melakukan update data experience');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        riwayat::where('id', $id)->where('tipe', $this->_tipe)->delete();
        return redirect()->route('experience.index')->with('success','berhasil melakukan delete data experience');
    }
}
