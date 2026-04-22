<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Jurusan;

class MahasiswaController extends Controller
{
    public function index(Request $request)
{
    $query = Mahasiswa::with('jurusan')->orderBy('nama', 'asc');

    if ($request->search) {
        $query->where(function($q) use ($request) {
       
            $q->where('nama', 'like', '%'.$request->search.'%')
              ->orWhere('nim', 'like', '%'.$request->search.'%');
        });
    }

    $data = $query->paginate(10)->withQueryString();

    return view('mahasiswa.index', compact('data'));
}

    public function create()
    {
        $jurusan = Jurusan::all();
        return view('mahasiswa.create', compact('jurusan'));
    }

    public function store(Request $request)
{
    $request->validate([
        'nim' => 'required|unique:mahasiswas,nim',
        'nama' => 'required|min:3',
        'id_jurusan' => 'required'
    ]);

    Mahasiswa::create($request->all());
    return redirect('/mahasiswa');
}

    public function edit($id)
    {
        $data = Mahasiswa::findOrFail($id);
        $jurusan = Jurusan::all();

        return view('mahasiswa.edit', compact('data', 'jurusan'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'nim' => 'required',
        'nama' => 'required|min:3',
        'id_jurusan' => 'required'
    ]);

    $data = Mahasiswa::findOrFail($id);
    $data->update($request->all());

    return redirect('/mahasiswa');
}

    public function show($id)
{
    $data = Mahasiswa::with('jurusan')->findOrFail($id);
    
    return view('mahasiswa.show', compact('data'));
}

    public function destroy($id)
    {
        Mahasiswa::destroy($id);
        return redirect('/mahasiswa');
    }
}