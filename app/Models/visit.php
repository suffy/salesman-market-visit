<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class visit extends Model
{
    use HasFactory;
    protected $table = "visits";
    protected $fillable = ["nama_toko","nama_pemilik","jenis_toko","alamat_toko","foto_toko","produk_kompetitor","catatan"];
}
