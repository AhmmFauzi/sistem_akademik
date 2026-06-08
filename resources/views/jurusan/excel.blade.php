<table border="1">
    <thead>
        <tr>
            <th>ID Jurusan</th>
            <th>Nama Jurusan</th>
            <th>Akreditasi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($jurusan as $j)
        <tr>
            <td>{{ $j->id_jurusan }}</td>
            <td>{{ $j->nama_jurusan }}</td>
            <td>{{ $j->akreditasi }}</td>
        </tr>
        @endforeach
    </tbody>
</table>