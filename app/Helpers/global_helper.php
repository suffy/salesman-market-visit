<?php

use App\Models\metadata;

function get_meta_value($meta_key){
    $data = metadata::where('meta_key', $meta_key)->first();

    if ($data) {
        return $data->meta_value;
    }
}

function set_about_nama($nama)
{
    $arr = explode(" ", $nama); 
    $kataakhir = end($arr);
    $kataakhir2 = "<span class = 'text-primary'>$kataakhir</span>";
    array_pop($arr);
    $namaAwal = implode(" ", $arr);
    return $namaAwal." ".$kataakhir2;
}