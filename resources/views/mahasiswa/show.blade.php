@extends('layout')

@section('content')
{{-- Container ini yang bikin kontennya di tengah halaman --}}
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8"> {{-- Mengatur lebar kartu agar proporsional --}}
            
            <h3 class="mb-4 fw-bold">Detail Mahasiswa</h3>

            <div class="card shadow-sm border-0" style="border-radius: 15px;">
                <div class="card-body p-5"> {{-- Padding dalam diperbesar biar lega --}}
                    <div class="row align-items-start">
                        
                        <div class="col-md-5 border-end">
                            <div class="mb-5">
                                <label class="text-muted d-block small fw-bold text-uppercase mb-2">Nomor Induk Mahasiswa</label>
                                <h4 class="fw-bold">{{ $data->nim }}</h4>
                            </div>

                            <div>
                                <label class="text-muted d-block small fw-bold text-uppercase mb-2">Jurusan / Program Studi</label>
                                <span class="badge px-3 py-2" style="background-color: #e7f1ff; color: #0d6efd; font-size: 1rem; border-radius: 8px;">
                                    {{ $data->jurusan->nama_jurusan }}
                                </span>
                            </div>
                        </div>

                        <div class="col-md-7 ps-md-5">
                            <div class="mb-5">
                                <label class="text-muted d-block small fw-bold text-uppercase mb-2">Nama Lengkap</label>
                                <h4 class="fw-bold text-dark">{{ $data->nama }}</h4>
                            </div>

                            <div>
                                <label class="text-muted d-block small fw-bold text-uppercase mb-2">Status Akademik</label>
                                <div class="d-flex align-items-center">
                                    <span class="rounded-circle bg-success me-2" style="width: 12px; height: 12px; display: inline-block;"></span>
                                    <span class="text-success fw-bold">Aktif</span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="mt-5 pt-4 border-top">
                        <a href="/mahasiswa" class="btn btn-secondary px-4 me-2" style="border-radius: 8px;">
                            Kembali
                        </a>
                        <a href="/mahasiswa/{{ $data->id_mahasiswa }}/edit" class="btn btn-warning text-white px-4" style="border-radius: 8px;">
                            Edit Data
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<style>
    body { background-color: #f8f9fa; }
    .card { background-color: #ffffff; }
</style>
@endsection