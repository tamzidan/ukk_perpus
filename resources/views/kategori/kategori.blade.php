@extends('layouts.perpus')

<head>
    <title>TAMZIDAN | KATEGORI</title>
</head>
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="mb-4">
                        <h1 class="h3 font-weight-bold mb-4">Kategori</h1>
    
                        <a href="{{ route('kategori.create') }}" class="btn btn-info">
                            + Tambah Data Kategori
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class>
                            <tr>
                                <th class="px-4 py-2">Nama Kategori</th>
                                <th class="col-3 px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($kategori as $k)
                            <tr>
                                <td class="px-4 py-2">{{ $k->nama_kategori }}</td>
                                <td class="px-4 py-2">
                                    <form method="post" action="{{route('kategori.destroy', $k->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn border border-1"><img src="../assets/images/bukuicons/delete.svg" alt=""></button>
                                    
                                    <a class="btn border border-1" href="{{route('kategori.edit', $k->id)}}"><img src="../assets/images/bukuicons/edit.svg" alt=""></a>
                                </td>
                                </form>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-4 py-2 text-center">Tidak ada data kategori.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection