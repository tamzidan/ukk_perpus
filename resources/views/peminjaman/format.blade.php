<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        h2 {
            color: #333;
        }

        p {
            color: #666;
        }
    </style>
</head>

<body>
    
    <h2 style="font-size: 50pt;">Laporan Peminjaman Buku</h2>

    <table>
        <thead>
            <tr>
            
                <th>Nama Peminjam</th>
                <th>Buku yang Dipinjam</th>
                <th>Tanggal Peminjaman</th>
            </tr>
        </thead>
        <tbody>
            @foreach($peminjaman as $p)
            <tr>
                <td>{{ $p->user->name }}</td>
                <td>{{ $p->buku->judul }}</td>
                <td>{{ Carbon\Carbon::parse($p->tanggal_peminjaman )->format('d/M/Y')}}</td>

            </tr>
            @endforeach
        </tbody>
    </table>

    
</body>

</html>