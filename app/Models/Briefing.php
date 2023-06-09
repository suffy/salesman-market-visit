<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Briefing extends Model
{
    use HasFactory;
    
    protected $table = "briefings";
    protected $fillable = ["tgl_briefing","jenis","keterangan","created_by","created_by_email","latitude", "longitude", "provinsi", "kota", "kecamatan"];
}