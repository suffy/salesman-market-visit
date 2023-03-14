<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Laravel\Socialite\Facades\Socialite;

class authController extends Controller
{

    public function index()
    {
        // return view('auth.index');
        return view('landing-page.layout');
    }

    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $user = Socialite::driver('google')->user();
        $id = $user->id;
        $email = $user->email;
        $name = $user->name;
        $avatar = $user->avatar;

        // cek apakah user sudah terdaftar di email
        $cek = User::where('email', $email)->count();
        if ($cek > 0 ) {

            $avatar_file = $id . ".jpg";
            $fileContent = file_get_contents($avatar);
            File::  put(public_path("admin/images/faces/$avatar_file"), $fileContent);

            // jika data login belum ada di tabel maka create, jika sudah ada maka update
            $user = User::updateOrCreate(['email' => $email], [
                'name'  => $name,
                'google_id' => $id,
                'avatar'    => $avatar_file
            ]);
            // membuat session
            Auth::login($user);

            // return redirect()->to('dashboard');
            return redirect()->to('beranda');
            
        }else{
            return redirect()->to('auth')->with('error', 'akun anda tidak diijinkan. silahkan hubungi administrator');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->to('/');
    }
}
