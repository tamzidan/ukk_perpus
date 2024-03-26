@extends('layouts.perpus')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Daftar Buku yang Dipinjam</div>

                    <div class="card-body">
                        @if ($peminjaman->isEmpty())
                            <p>Anda belum meminjam buku.</p>
                        @else
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul Buku</th>
                                            <th>Tanggal Peminjaman</th>
                                            <th>Tanggal Pengembalian</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($peminjaman as $index => $pinjam)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $pinjam->buku->judul }}</td>
                                                <td>{{ $pinjam->tanggal_peminjaman }}</td>
                                                <td>{{ $pinjam->tanggal_pengembalian }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection