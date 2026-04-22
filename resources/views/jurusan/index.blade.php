@extends('layout')

@section('content')

<h3 class="mb-4">Data Jurusan</h3>

<div class="card p-4">

    <div class="d-flex justify-content-between mb-3">
        <h5>Daftar Jurusan</h5>

        <div class="d-flex gap-2">
            {{-- 🔍 SEARCH --}}
            <form method="GET" action="/jurusan">
                <input 
                    type="text" 
                    name="search" 
                    class="form-control" 
                    placeholder="Cari..."
                    value="{{ request('search') }}"
                >
            </form>

            <a href="{{ url('/jurusan/create') }}" class="btn btn-primary">
                + Tambah Jurusan
            </a>
        </div>
    </div>

    <table class="table table-hover align-middle">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Jurusan</th>
                <th>Akreditasi</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $d)
            <tr>
                {{-- Nomor urut kontinu sesuai halaman --}}
                <td>{{ ($data->currentPage() - 1) * $data->perPage() + $loop->iteration }}</td>
                <td>{{ $d->nama_jurusan }}</td>
                <td>
                    <span class="badge {{ $d->akreditasi == 'A' ? 'bg-success' : 'bg-primary' }}" style="border-radius: 8px; padding: 5px 12px;">
                        {{ $d->akreditasi }}
                    </span>
                </td>
                <td class="text-center">
                    <a href="{{ url('/jurusan/'.$d->id_jurusan.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                    
                    <form action="{{ url('/jurusan/'.$d->id_jurusan) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus jurusan ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Pagination UI Mungil --}}
    <div class="mt-4 d-flex justify-content-center">
        {{ $data->onEachSide(1)->links() }}
    </div>

</div>

@endsection