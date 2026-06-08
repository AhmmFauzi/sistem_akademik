<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Matakuliah</th>
            <th>SKS</th>
            <th>Jurusan</th>
        </tr>
    </thead>

    <tbody>
        @foreach($matakuliah as $m)
        <tr>
            <td>{{ $m->id_matakuliah }}</td>
            <td>{{ $m->nama_matakuliah }}</td>
            <td>{{ $m->sks }}</td>
            <td>{{ $m->jurusan->nama_jurusan }}</td>
        </tr>
        @endforeach
    </tbody>
</table>