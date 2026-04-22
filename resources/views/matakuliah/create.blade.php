@extends('layout')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<h3>Tambah Matakuliah</h3>

<form method="POST" action="/matakuliah">
    @csrf

    <div class="mb-3">
        <label>Nama Matakuliah</label>
        <input type="text" name="nama_matakuliah" class="form-control">
    </div>

    <div class="mb-3">
        <label>SKS</label>
        <input type="number" name="sks" class="form-control">
    </div>

    <div class="mb-3">
        <label>Jurusan</label>
        <select name="id_jurusan" class="form-control">
            @foreach($jurusan as $j)
                <option value="{{ $j->id_jurusan }}">
                    {{ $j->nama_jurusan }}
                </option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-primary">Simpan</button>
</form>

@endsection