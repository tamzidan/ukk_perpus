@extends('layouts.perpus')
@section('content')
<body>
    
    <h2 style="font-size: 50pt;">Laporan Peminjaman Buku Tamzidan</h2>

    <table>
        <thead>
            <tr>
            
                <th>Nama Peminjam</th>
                <th>Buku yang Dipinjam</th>
                <th>Tanggal Pinjaman</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach($peminjaman as $p) --}}
            <tr>
                <td>{{ $peminjaman ->user->name }}</td>
                <td>{{ $peminjaman ->buku->judul }}</td>
                <td>{{ Carbon\Carbon::parse($peminjaman->tanggal_peminjaman )->format('d/M/Y')}}</td>
                <td>{{ Carbon\Carbon::parse($peminjaman->tanggal_pengembalian )->format('d/M/Y')}}</td>
                <td>{{ $peminjaman ->status }}</td>
            </tr>
            {{-- @endforeach --}}
        </tbody>
    </table>

    
</body>
@endsection