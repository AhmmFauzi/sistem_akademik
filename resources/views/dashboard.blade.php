@extends('layout')

@section('content')

<h3 class="mb-4">Dashboard</h3>

<div class="row g-4">

    {{-- Jurusan --}}
    <div class="col-md-4">
        <div class="card p-4">
            <h6>Jurusan</h6>
            <h2 style="color: #5D5FEF;">{{ $jumlahJurusan }}</h2>
        </div>
    </div>

    {{-- Mahasiswa --}}
    <div class="col-md-4">
        <div class="card p-4">
            <h6>Mahasiswa</h6>
            <h2 style="color: #EF5DA8;">{{ $jumlahMahasiswa }}</h2>
        </div>
    </div>

    {{-- Matakuliah --}}
    <div class="col-md-4">
        <div class="card p-4">
            <h6>Matakuliah</h6>
            <h2 style="color: #4EA5FF;">{{ $jumlahMatakuliah }}</h2>
        </div>
    </div>

</div>

{{-- CHART --}}
<div class="row mt-4 g-4">

    <div class="col-md-8">
        <div class="card p-4">
            <h6 class="mb-3">Statistik Data</h6>
            <canvas id="barChart"></canvas>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-4">
            <h6 class="mb-3">Perbandingan</h6>
            <canvas id="pieChart"></canvas>
        </div>
    </div>

</div>
    
<div class="row mt-4 g-4">

    <div class="col-md-12">
        <div class="card p-4">
            <h6 class="mb-3">Mahasiswa per Jurusan</h6>
            <canvas id="jurusanChart"></canvas>
        </div>
    </div>

<div class="col-md-6">
    <div class="card p-4">
        <h6>Tren Data</h6>
        <canvas id="lineChart"></canvas>
    </div>
</div>

<div class="col-md-6">
    <div class="card p-4">
        <h6>Distribusi Aktivitas</h6>
        <canvas id="polarChart"></canvas>
    </div>
</div>

</div>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function() {

    // 🔹 BAR CHART
    const barCtx = document.getElementById('barChart');

    new Chart(barCtx, {
        type: 'bar',
        data: {
            labels: ['Jurusan', 'Mahasiswa', 'Matakuliah'],
            datasets: [{
                label: 'Jumlah Data',
                data: [{{ $jumlahJurusan }}, {{ $jumlahMahasiswa }}, {{ $jumlahMatakuliah }}],
                backgroundColor: ['#5D5FEF','#EF5DA8','#4EA5FF'],
                borderRadius: 8
            }]
        },
        options: {
            plugins: {
                legend: { display: false }
            }
        }
    });

    const pieCtx = document.getElementById('pieChart');

    new Chart(pieCtx, {
        type: 'doughnut',
        data: {
            labels: ['Jurusan', 'Mahasiswa', 'Matakuliah'],
            datasets: [{
                data: [{{ $jumlahJurusan }}, {{ $jumlahMahasiswa }}, {{ $jumlahMatakuliah }}],
                backgroundColor: ['#5D5FEF','#EF5DA8','#4EA5FF']
            }]
        }
    });

    const jurusanCtx = document.getElementById('jurusanChart');

    if (jurusanCtx) {
        new Chart(jurusanCtx, {
            type: 'bar',
            data: {
                labels: [
                    @foreach($mahasiswaPerJurusan as $item)
                        '{{ $item->nama_jurusan }}',
                    @endforeach
                ],
                datasets: [{
                    label: 'Mahasiswa per Jurusan',
                    data: [
                        @foreach($mahasiswaPerJurusan as $item)
                            {{ $item->total }},
                        @endforeach
                    ],
                    backgroundColor: '#5D5FEF',
                    borderRadius: 8
                }]
            }
        });
    }

        const lineCtx = document.getElementById('lineChart');

if (lineCtx) {
    new Chart(lineCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei'],
            datasets: [{
                label: 'Mahasiswa',
                data: [5, 10, 8, 15, 12], // dummy dulu
                borderColor: '#5D5FEF',
                fill: false,
                tension: 0.4
            }]
        }
    });
}

const polarCtx = document.getElementById('polarChart');

if (polarCtx) {
    new Chart(polarCtx, {
        type: 'polarArea',
        data: {
            labels: ['Jurusan', 'Mahasiswa', 'Matakuliah'],
            datasets: [{
                data: [{{ $jumlahJurusan }}, {{ $jumlahMahasiswa }}, {{ $jumlahMatakuliah }}],
                backgroundColor: [
                    '#5D5FEF',
                    '#EF5DA8',
                    '#4EA5FF'
                ]
            }]
        }
    });
}

});
</script>
@endsection