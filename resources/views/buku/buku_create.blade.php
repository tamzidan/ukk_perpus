@extends('layouts.perpus')
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mx-auto py-4">
                        <div class="flex justify-center">
                            <div class="w-full md:w-1/2">
                                <div class="bg-white rounded-lg shadow-md">
                                    <div class="p-6">
                                        @if(session('success'))
                                        <p class="text-success">{{ session('success') }}</p>
                                        @endif

                                        <form action="{{ route('buku.store') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <div class="mb-4">
                                                <label for="judul"
                                                    class="block text-sm font-semibold mb-2">Judul:</label>
                                                <input type="text" name="judul" class="w-full border p-2" required>
                                            </div>

                                            <div class="mb-4">
                                                <label for="penulis"
                                                    class="block text-sm font-semibold mb-2">Penulis:</label>
                                                <input type="text" name="penulis" class="w-full border p-2" required>
                                            </div>

                                            <div class="mb-4">
                                                <label for="penerbit"
                                                    class="block text-sm font-semibold mb-2">Penerbit:</label>
                                                <input type="text" name="penerbit" class="w-full border p-2" required>
                                            </div>

                                            <div class="mb-3">
                                <label for="tahun_terbit" class="form-label">Tahun Terbit:</label>
                                <select name="tahun_terbit" class="form-select custom-select" required>
                                    @php
                                        $currentYear = date('Y');
                                        $startYear = 1900; // You can adjust the start year as needed
                                    @endphp
                                    @for($year = $currentYear; $year >= $startYear; $year--)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>

                                            <div class="mb-4">
                                                <label for="kategori_id"
                                                    class="block text-sm font-semibold mb-2">Kategori:</label>
                                                <select name="kategori_id" class="w-full border p-2" required>
                                                    @foreach($kategori as $k)
                                                    <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="mb-4">
                                                <label for="foto" class="form-label">Foto Buku:</label>
                                                <input type="file" name="foto" accept="image/*" class="form-control" required>
                                            </div>

                                            <button type="submit"
                                            <button type="button" class="btn btn-success">Simpan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection