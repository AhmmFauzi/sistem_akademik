<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;

class JurusanController extends Controller
{
    public function index(Request $request)
    {
        // UPDATE: Ditambahkan orderBy agar urut abjad
        $query = Jurusan::orderBy('nama_jurusan', 'asc');

        if ($request->search) {
            $query->where('nama_jurusan', 'like', '%'.$request->search.'%');
        }

        // Paginate 10 data
        $data = $query->paginate(10)->withQueryString();

        return view('jurusan.index', compact('data'));
    }

    public function create()
    {
        return view('jurusan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jurusan' => 'required|min:3',
            'akreditasi' => 'required'
        ]);

        Jurusan::create($request->all());
        return redirect('/jurusan');
    }

    public function edit($id)
    {
        // Menggunakan findOrFail agar jika ID tidak ada langsung 404 (lebih aman)
        $data = Jurusan::findOrFail($id);
        return view('jurusan.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_jurusan' => 'required|min:3',
            'akreditasi' => 'required'
        ]);

        $data = Jurusan::findOrFail($id);
        $data->update($request->all());

        return redirect('/jurusan');
    }

    public function destroy($id)
    {
        $data = Jurusan::findOrFail($id);
        $data->delete();
        return redirect('/jurusan');
    }
}