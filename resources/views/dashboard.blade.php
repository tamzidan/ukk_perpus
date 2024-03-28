@extends('layouts.perpus')

@section('content')
<div class="py-5">
    <div class="container">
        <h1 class="h3 font-weight-bold mb-4">Dashboard Tamzidan</h1>
            @php
                $totalBuku = \App\Models\Buku::count();
                $totalPeminjam = \App\Models\Peminjaman::count();
                $totalUser = \App\Models\User::count();
            @endphp
        @role('admin')
        <div class="row">
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Buku</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalBuku }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-book fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Peminjaman</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPeminjam }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Total User</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalUser }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endrole
        <div class="card border-0 shadow-lg rounded-lg">
            <div class="card-body">
                <div class="text-gray-900 text-center">
                    {{ __("Selamat Datang") }} {{ Auth::user()->name }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection