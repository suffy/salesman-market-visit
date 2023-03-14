<?php

use App\Models\halaman;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\testController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\depanController;
use App\Http\Controllers\skillController;
use App\Http\Controllers\visitController;
use App\Http\Controllers\berandaController;
use App\Http\Controllers\halamanController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\educationController;
use App\Http\Controllers\experienceController;
use App\Http\Controllers\pengaturanHalamanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return view('landing-page.layout');
});

Route::get('/beranda', [berandaController::class, "index"]);

Route::redirect('home', 'beranda'); // redirect dari home ke halaman dashboard

Route::get('/auth', [authController::class, "index"])->name('login')->middleware('guest'); // jika user terlanjur ke halaman dashboard, maka akan diarahkan ke halaman /auth, sehingga di berikan penamaan name('login'), fungsi middleware guest yaitu tidak perlu mengakses halaman auth jika sudah login

Route::get('/auth/redirect', [authController::class, "redirect"])->middleware('guest');

Route::get('/auth/callback', [authController::class, "callback"])->middleware('guest');

Route::get('/auth/logout', [authController::class, "logout"]);

Route::prefix('beranda')->middleware('auth')->group(
    function(){
        Route::get('/', function(){
            return view('beranda.layout');
        });
        Route::get('/', [berandaController::class, 'index']);
        Route::resource('visit', visitController::class);
        Route::get('export', [visitController::class, "export"])->name('visitController.export');
    }
);

Route::prefix('dashboard')->middleware('auth')->group(
    function(){
        Route::get('/', function(){
            return view('dashboard.layout');
        });
        Route::get('/', [halamanController::class, 'index']);
        Route::resource('halaman', halamanController::class);
        Route::resource('experience', experienceController::class);
        Route::resource('education', educationController::class);
        Route::get('skill', [skillController::class, "index"])->name('skill.index');
        Route::post('skill', [skillController::class, "update"])->name('skill.update');
        Route::get('profile', [profileController::class, "index"])->name('profile.index');
        Route::post('profile', [profileController::class, "update"])->name('profile.update');
        Route::get('pengaturanhalaman', [pengaturanHalamanController::class, "index"])->name('pengaturanhalaman.index');
        Route::post('pengaturanhalaman', [pengaturanHalamanController::class, "update"])->name('pengaturanhalaman.update');
    }
);