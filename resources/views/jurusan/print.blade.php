<!DOCTYPE html>
<html>
<head>
    <title>Data Jurusan</title>

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

    <h2>Data Jurusan</h2>

    <table>
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

</body>
</html>