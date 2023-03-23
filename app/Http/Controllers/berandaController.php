<?php

namespace App\Http\Controllers;

use App\Models\Briefing;
use App\Models\Meeting;
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
        // $total_meeting = DB::table("meetings")
        //             ->select(DB::raw('count(*) as total_meeting'))
        //             // ->groupBy('nama_toko')
        //             ->get();

        // $total_briefing = DB::table("briefings")
        //             ->select(DB::raw('count(*) as total_briefing'))
        //             // ->groupBy('nama_toko')
        //             ->get();

        $total_data = visit::count();
        $total_toko = DB::table("visits")
                    ->select(DB::raw('count(*) as total_toko, nama_toko'))
                    ->groupBy('nama_toko')
                    ->get();

        $total_meeting = Meeting::count();
        $total_briefing = Briefing::count();

        $data = [
            "total_data" => $total_data,
            "total_toko" => $total_toko->count(),
            "total_meeting" => $total_meeting,
            // "total_briefing" => $total_briefing->count(),
            "total_briefing" => $total_briefing,
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
