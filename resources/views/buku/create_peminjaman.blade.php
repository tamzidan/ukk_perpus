@extends('layouts.perpus')
@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
                <form action="{{ route('peminjaman.store') }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="user_id" class="block text-sm font-medium text-gray-700">Nama Peminjam:</label>
                        <select name="user_id" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="buku_id" class="block text-sm font-medium text-gray-700">Buku yang Dipinjam:</label>
                        <select name="buku_id" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            @foreach($buku as $b)
                                <option value="{{ $b->id }}">{{ $b->judul }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_peminjaman" class="block text-sm font-medium text-gray-700">Tanggal Peminjaman:</label>
                        <input type="date" required name="tanggal_peminjaman" id="tanggal_peminjaman" class="mt-1 p-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300">
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_pengembalian" class="block text-sm font-medium text-gray-700">Tanggal Pengembalian:</label>
                        <input type="date" required name="tanggal_pengembalian" id="tanggal_pengembalian" class="mt-1 p-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">
                        Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endsection