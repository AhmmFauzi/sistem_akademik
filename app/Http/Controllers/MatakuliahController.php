<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matakuliah;
use App\Models\Jurusan;

class MatakuliahController extends Controller
{
  public function index(Request $request)
{
    // Kita join ke tabel jurusans agar bisa order berdasarkan nama_jurusan
    $query = Matakuliah::select('matakuliahs.*')
        ->join('jurusans', 'matakuliahs.id_jurusan', '=', 'jurusans.id_jurusan')
        ->with('jurusan') // Tetap eager load untuk relasi
        ->orderBy('jurusans.nama_jurusan', 'asc'); // Urut abjad JURUSAN

    if ($request->search) {
        $query->where('nama_matakuliah', 'like', '%'.$request->search.'%');
    }

    $data = $query->paginate(10)->withQueryString();

    return view('matakuliah.index', compact('data'));
}

    public function create()
    {
        $jurusan = Jurusan::all();
        return view('matakuliah.create', compact('jurusan'));
    }

   public function store(Request $request)
{
    $request->validate([
        'nama_matakuliah' => 'required|min:3',
        'sks' => 'required|numeric',
        'id_jurusan' => 'required'
    ]);

    Matakuliah::create($request->all());
    return redirect('/matakuliah');
}
    public function edit($id)
    {
        $data = Matakuliah::findOrFail($id);
        $jurusan = Jurusan::all();

        return view('matakuliah.edit', compact('data', 'jurusan'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'nama_matakuliah' => 'required|min:3',
        'sks' => 'required|numeric',
        'id_jurusan' => 'required'
    ]);

    $data = Matakuliah::findOrFail($id);
    $data->update($request->all());

    return redirect('/matakuliah');
}

    public function destroy($id)
    {
        Matakuliah::destroy($id);
        return redirect('/matakuliah');
    }
}