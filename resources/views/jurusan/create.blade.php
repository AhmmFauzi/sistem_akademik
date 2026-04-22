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

<h3>Tambah Jurusan</h3>

<form method="POST" action="/jurusan">
    @csrf

    <div class="mb-3">
        <label>Nama Jurusan</label>
        <input type="text" name="nama_jurusan" class="form-control">
    </div>

    <div class="mb-3">
        <label>Akreditasi</label>
        <input type="text" name="akreditasi" class="form-control">
    </div>

    <button class="btn btn-primary">Simpan</button>
</form>

@endsection