<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;

use App\Models\Jurusan;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;

/*
|--------------------------------------------------------------------------
| AUTH (Login & Logout)
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

/*
|--------------------------------------------------------------------------
| REDIRECT ROOT
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect('/login');
});

/*
|--------------------------------------------------------------------------
| PROTECTED ROUTES (HARUS LOGIN)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {

        $jumlahJurusan = Jurusan::count();
        $jumlahMahasiswa = Mahasiswa::count();
        $jumlahMatakuliah = Matakuliah::count();

        $mahasiswaPerJurusan = DB::table('mahasiswas')
            ->join('jurusans', 'mahasiswas.id_jurusan', '=', 'jurusans.id_jurusan')
            ->select('jurusans.nama_jurusan', DB::raw('count(*) as total'))
            ->groupBy('jurusans.nama_jurusan')
            ->get();

        return view('dashboard', compact(
            'jumlahJurusan',
            'jumlahMahasiswa',
            'jumlahMatakuliah',
            'mahasiswaPerJurusan'
        ));
    });

    // CRUD 
    Route::resource('jurusan', JurusanController::class);
    Route::resource('mahasiswa', MahasiswaController::class);
    Route::resource('matakuliah', MatakuliahController::class);
});