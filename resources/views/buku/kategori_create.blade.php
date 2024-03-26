@extends('layouts.perpus')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1 class="h3 text-2xl font-semibold mb-4">Formulir Input Kategori</h1>
                    </div>

                    <div class="card-body">
                        @if(session('success'))
                            <p class="text-success">{{ session('success') }}</p>
                        @endif

                        <form action="{{ route('kategori.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-4">
                                <label for="nama_kategori" class="form-label">Nama Kategori:</label>
                                <input type="text" name="nama_kategori" class="form-control" required>
                            </div>
                            <button type=" submit" class="btn btn-success">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection