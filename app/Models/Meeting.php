<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    protected $table = "meetings";
    protected $fillable = ["tgl_meeting","jenis","keterangan","created_by","created_by_email","tgl_meeting_selesai","latitude", "longitude", "provinsi", "kota", "kecamatan"];

}
