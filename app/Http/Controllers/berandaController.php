<?php

namespace App\Http\Controllers;

use App\Models\visit;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class berandaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // $total_data = DB::table('visits')
        //      ->select(DB::raw('count(*) as total_data'))
            //  ->where('status', '<>', 1)
            //  ->groupBy('status')
            //  ->get();


        $total_data = visit::count();
        // $total_toko = visit::groupBy("nama_toko")->count("nama_toko");
        $total_toko = DB::table("visits")
                        // ->selectRaw('count(nama_toko) as total_toko')
                        // ->groupBy('nama_toko')
                        // ->get();
                        ->select(DB::raw('count(*) as total_toko, nama_toko'))
                        // ->where('status', '<>', 1)
                        ->groupBy('nama_toko')
                        ->get();
        // dd($total_toko->count());

        $data = [
            "total_data" => $total_data,
            "total_toko" => $total_toko->count(),
        ];
        return view('beranda.index')->with("data", $data);
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
    public function store(Request $request): RedirectResponse
    {
        //
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

}
