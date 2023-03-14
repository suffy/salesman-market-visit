<?php

namespace App\Http\Controllers;

use App\Models\halaman;
use Illuminate\Http\Request;

class depanController extends Controller
{
    public function index(){
        $about_id = get_meta_value('_halaman_about');
        $about_data = halaman::where('id', $about_id)->first();
        $interest_id = get_meta_value('_interest_id');
        $interest_data = halaman::where('id', $interest_id)->first();

        return view('depan.index')->with([
            'about' => $about_data,  
            'interest' => $interest_data,  
        ]);
    }
}
