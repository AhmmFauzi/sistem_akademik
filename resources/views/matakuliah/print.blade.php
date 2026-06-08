<!DOCTYPE html>
<html>
<head>
    <title>Data Matakuliah</title>

    <style>
        table{
            width:100%;
            border-collapse: collapse;
        }

        table, th, td{
            border:1px solid black;
        }

        th, td{
            padding:8px;
            text-align:left;
        }

        h2{
            text-align:center;
        }
    </style>
</head>
<body onload="window.print()">

<h2>Data Matakuliah</h2>

<table>
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

</body>
</html>