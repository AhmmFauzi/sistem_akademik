<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaApi extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::all();

        if (!$mahasiswa) {
            return response()->json([
        'status' => 200,
        'success' => true,
        'message' => 'Data mahasiswa berhasil diambil',
        'result' => $mahasiswa
    ], 200);
        }

        return response()->json([
            'status' => 200,
            'success' => true,
            'message' => 'Data mahasiswa berhasil diambil',
            'result' => $mahasiswa
        ], 200);
    }

    // GET DATA BY ID
   public function show($id)
{
    $mahasiswa = Mahasiswa::find($id);

    if (!$mahasiswa) {
        return response()->json([
            'status' => 404,
            'success' => false,
            'message' => 'Data mahasiswa tidak ditemukan'
        ], 404);
    }

    return response()->json([
        'status' => 200,
        'success' => true,
        'message' => 'Detail data mahasiswa',
        'result' => $mahasiswa
    ], 200);
}

    // TAMBAH DATA
public function store(Request $request)
{
    $request->validate([
        'nim' => 'required',
        'nama' => 'required',
        'id_jurusan' => 'required'
    ]);

    $mahasiswa = Mahasiswa::create([
        'nim' => $request->nim,
        'nama' => $request->nama,
        'id_jurusan' => $request->id_jurusan
    ]);

    return response()->json([
        'status' => 200,
        'success' => true,
        'message' => 'Data mahasiswa berhasil ditambahkan',
        'result' => $mahasiswa
    ], 200);
}

// UPDATE DATA
public function update(Request $request, $id)
{
    $mahasiswa = Mahasiswa::find($id);

    if (!$mahasiswa) {
        return response()->json([
            'success' => false,
            'message' => 'Data mahasiswa tidak ditemukan'
        ], 404);
    }

    $mahasiswa->update([
        'nim' => $request->nim,
        'nama' => $request->nama,
        'id_jurusan' => $request->id_jurusan
    ]);

    return response()->json([
        'status' => 200,
        'success' => true,
        'message' => 'Data mahasiswa berhasil diupdate',
        'result' => $mahasiswa
    ], 200);
}

// DELETE DATA
public function destroy($id)
{
    $mahasiswa = Mahasiswa::find($id);

    if (!$mahasiswa) {
        return response()->json([
            'success' => false,
            'message' => 'Data mahasiswa tidak ditemukan'
        ], 404);
    }

    $mahasiswa->delete();

    return response()->json([
        'status' => 200,
        'success' => true,
        'message' => 'Data mahasiswa berhasil dihapus'
    ], 200);
}

}