@extends('layouts.perpus')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body bg-white">
                        <h1 class="h3 font-weight-bold mb-4">Tambah Data Peminjaman</h1>

                        @if (session('success'))
                            <p class="text-success">{{ session('success') }}</p>
                        @endif

                        <form action="{{ route('peminjaman.store') }}" method="post">
                            @csrf

                            <div class="mb-3">
                                <label for="user_id" class="form-label">Nama Peminjam:</label>
                                <select class="form-control form-select-lg mb-3" name="user_id" required>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="mb-3">
                                <label for="buku_id" class="form-label">Buku yang Dipinjam:</label>
                                <select name="buku_id" required class="form-control form-select-lg mb-3">
                                    @foreach ($buku as $b)
                                        <option value="{{ $b->id }}">{{ $b->judul }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="tanggal_peminjaman" class="form-label">Tanggal Peminjaman:</label>
                                <input type="date" required name="tanggal_peminjaman" id="tanggal_peminjaman"
                                    class="form-control" value="{{ date('Y-m-d') }}" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="tanggal_pengembalian" class="form-label">Tanggal Pengembalian:</label>
                                <input type="date" required name="tanggal_pengembalian" id="tanggal_pengembalian"
                                    class="form-control"
                                    value="{{ \Carbon\Carbon::parse(date('Y-m-d'))->addDays(4)->format('Y-m-d') }}">
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection