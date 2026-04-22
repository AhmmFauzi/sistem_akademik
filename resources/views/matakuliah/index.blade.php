@extends('layout')

@section('content')

<h3 class="mb-4">Data Matakuliah</h3>

<div class="card p-4">

    <div class="d-flex justify-content-between mb-3">
    
    <h5>Daftar Matakuliah</h5>

    <div class="d-flex gap-2">
        {{-- 🔍 FORM SEARCH --}}
        <form method="GET" action="/matakuliah">
            <input 
                type="text" 
                name="search" 
                class="form-control" 
                placeholder="Cari..."
                value="{{ request('search') }}"
            >
        </form>

        <a href="{{ url('/matakuliah/create') }}" class="btn btn-primary">
            + Tambah Matakuliah
        </a>
    </div>

</div>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>SKS</th>
                <th>Jurusan</th>
                <th>Aksi</th>
            </tr>
        </thead>

        {{-- Ganti bagian <tbody> dan tambahkan links di bawah table --}}
<tbody>
    @foreach($data as $d)
    <tr>
        {{-- Nomor urut kontinu --}}
        <td>{{ ($data->currentPage() - 1) * $data->perPage() + $loop->iteration }}</td>
        <td>{{ $d->nama_matakuliah }}</td>
        <td>{{ $d->sks }}</td>
        <td>{{ $d->jurusan->nama_jurusan }}</td>
        <td>
            <a href="/matakuliah/{{ $d->id_matakuliah }}/edit" class="btn btn-warning btn-sm">Edit</a>

            <form action="/matakuliah/{{ $d->id_matakuliah }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">
                    Hapus
                </button>
            </form>
        </td>
    </tr>
    @endforeach
</tbody>
</table>
<div class="mt-4 d-flex justify-content-center pagination-sm">
    {{ $data->onEachSide(1)->links() }}
</div>

</div>

@endsection