<?php

namespace App\Exports;

use App\Models\visit;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class VisitsExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function view(): View
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
            return view('beranda.visit.exports.visit', [
                'visit' => visit::query()
                ->join('product_mpm', 'product_mpm.id_ref', '=', 'visits.id')
                ->join('products', 'product_mpm.kodeprod', '=', 'products.kodeprod')
                ->select('visits.nama_toko','visits.nama_pemilik','visits.jenis_toko','visits.alamat_toko','visits.created_by','product_mpm.kodeprod','products.namaprod','products.supp','products.kode_group','products.nama_group','products.kode_subgroup','products.nama_subgroup')
                ->get(),
            ]);
        }else{
            return view('beranda.visit.exports.visit', [
                'visit' => visit::query()
                ->join('product_mpm', 'product_mpm.id_ref', '=', 'visits.id')
                ->join('products', 'product_mpm.kodeprod', '=', 'products.kodeprod')
                ->select('visits.nama_toko','visits.nama_pemilik','visits.jenis_toko','visits.alamat_toko','visits.created_by','product_mpm.kodeprod','products.namaprod','products.supp','products.kode_group','products.nama_group','products.kode_subgroup','products.nama_subgroup')
                ->where('created_by_email', Auth::user()->email)->get(),
            ]);
        }

        
    }

}
