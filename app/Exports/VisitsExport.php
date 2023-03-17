<?php

namespace App\Exports;

use App\Models\visit;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

use Maatwebsite\Excel\Concerns\WithProperties;

class VisitsExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function view(): View
    {
        return view('beranda.visit.exports.visit', [
            'visit' => visit::query()
            ->join('product_mpm', 'product_mpm.id_ref', '=', 'visits.id')
            ->join('products', 'product_mpm.kodeprod', '=', 'products.kodeprod')
            // ->select('*')
            ->select('visits.nama_toko','visits.nama_pemilik','visits.jenis_toko','visits.alamat_toko','visits.created_by','product_mpm.kodeprod','products.namaprod','products.supp','products.kode_group','products.nama_group','products.kode_subgroup','products.nama_subgroup')
            // ->select('users.name', 'users.country', 'orders.price')
            // ->where('users.country', $this->country)
            ->get(),
        ]);
    }

}
