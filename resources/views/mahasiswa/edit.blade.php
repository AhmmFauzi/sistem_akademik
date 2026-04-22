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

<h3>Edit Mahasiswa</h3>

<form method="POST" action="/mahasiswa/{{ $data->id_mahasiswa }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>NIM</label>
        <input type="text" name="nim" value="{{ $data->nim }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" value="{{ $data->nama }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Jurusan</label>
        <select name="id_jurusan" class="form-control">
            @foreach($jurusan as $j)
                <option value="{{ $j->id_jurusan }}"
                    {{ $data->id_jurusan == $j->id_jurusan ? 'selected' : '' }}>
                    {{ $j->nama_jurusan }}
                </option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-success">Update</button>
</form>

@endsection