@extends('layout')

@section('content')

<h3 class="mb-4">Data Mahasiswa</h3>

<div class="card p-4">
    <div class="d-flex justify-content-between mb-3">
        <h5>Daftar Mahasiswa (A-Z)</h5>
        <div class="d-flex gap-2">
            <form method="GET" action="/mahasiswa">
                <input 
                    type="text" 
                    name="search" 
                    class="form-control" 
                    placeholder="Cari NIM/Nama..."
                    value="{{ request('search') }}"
                >
            </form>
            <a href="{{ url('/mahasiswa/create') }}" class="btn btn-primary">
                + Tambah Mahasiswa
            </a>
        </div>
    </div>

    <table class="table table-hover align-middle">
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
       <tbody>
    @foreach($data as $d)
    <tr>
        <td>{{ ($data->currentPage() - 1) * $data->perPage() + $loop->iteration }}</td>
        <td>{{ $d->nim }}</td>
        
        {{-- UPDATE DI SINI: Nama sekarang bisa diklik untuk lihat detail --}}
        <td>
    <a href="{{ url('/mahasiswa/'.$d->id_mahasiswa) }}" class="text-decoration-none fw-bold text-dark hover-link">
        {{ $d->nama }}
    </a>
</td>
        
        <td>{{ $d->jurusan->nama_jurusan }}</td>
        <td class="text-center">
            {{-- Tambahan Opsional: Tombol Detail --}}
            <a href="{{ url('/mahasiswa/'.$d->id_mahasiswa) }}" class="btn btn-info btn-sm text-white">Detail</a>
            
            <a href="{{ url('/mahasiswa/'.$d->id_mahasiswa.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ url('/mahasiswa/'.$d->id_mahasiswa) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data?')">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</tbody>
    </table>

    <div class="mt-4 d-flex justify-content-center">
        {{ $data->links() }}
    </div>
</div>

@endsection