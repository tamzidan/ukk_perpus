<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;


class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::with('user', 'buku')->get();
        return view('peminjaman.peminjaman', compact('peminjaman'));
    }

    public function tambahPeminjaman()
    {
        $users = User::all();
        $buku = Buku::all();
        return view('peminjaman.create_peminjaman', compact('users', 'buku'));
    }

    public function storePeminjaman(Request $request){
        $request->validate([
            'user_id'=> 'required|exists:users,id',
            'buku_id'=> 'required|exists:buku,id',
            'tanggal_peminjaman'=> 'required|date',
            'tanggal_pengembalian' => 'required|date',

        ]);

        Peminjaman::create([
            'user_id'=>$request->user_id,
            'buku_id'=>$request->buku_id,
            'tanggal_peminjaman'=>$request->tanggal_peminjaman,
            'tanggal_pengembalian'=>$request->tanggal_pengembalian,
            'status' => 'Dipinjam'
        ]);
        return redirect ('/peminjaman');
    }

    // public function kembalikanBuku($id)
    // {
    //     $peminjaman = Peminjaman::findOrFail($id);
    //     $peminjaman->tanggal_pengembalian = now();
    //     $peminjaman->status = 'Dikembalikan';
    //     $peminjaman->save();

    //     return redirect()->route('peminjaman.index')->with('success', 'Buku berhasil dikembalikan');
    // }
    public function kembalikanBuku($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman -> sekarang = now();
 
        // Menghitung selisih hari antara tanggal seharusnya dikembalikan dan tanggal pengembalian
        $tanggal_seharusnya_dikembalikan = strtotime($peminjaman->tanggal_pengembalian);
        $tanggal_kembali = strtotime(date('Y-m-d H:i:s'));
        $selisih_hari = ($tanggal_kembali - $tanggal_seharusnya_dikembalikan) / (60 * 60 * 24);
 
        if ($selisih_hari > 0) {
            // Jika terlambat, status menjadi 'Denda'
            $peminjaman->status = 'Denda';
        } else {
            // Jika tidak, statusnya 'Dikembalikan'
            $peminjaman->status = 'Dikembalikan';
        }
 
        $peminjaman->save();
 
        return redirect()->route('peminjaman.index')->with('success', 'Buku berhasil dikembalikan');
    }


    public function print(){
        $user = User::all();
        $buku = Buku::all();
        $peminjaman = Peminjaman::all();
        $data = [
            'user' => $user,
            'buku'  => $buku,
            'peminjaman' => $peminjaman,
        ];
        $pdf = PDF::loadView('peminjaman.format', $data)
        ->setPaper('a4');
        return $pdf->download('Laporan.pdf');
        
    }

    public function userPeminjaman()
    {
        //mendapatkan id pengguna yang login
        $userId = Auth::id();

        //menampilkan data peminjaman yang hanya dimiliki oleh user yang sedang masuk
        $peminjaman = Peminjaman::with('user', 'buku')
            ->where('user_id', $userId)
            ->get();

        return view('peminjaman.user_index', compact('peminjaman'));
    }

    
}
