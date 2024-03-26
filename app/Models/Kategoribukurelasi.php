<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategoribukurelasi extends Model
{
    use HasFactory;
     protected $table = 'kategoribukurelasi';

     protected $fillable = [
        'buku_id',
        'kategori_id'
     ];

     public function buku()
     {
        return $this->belongsTo(Buku::class, 'buku_id');
     }

     public function kategori()
     {
        return $this->belongsTo(Kategori::class, 'kategori_id');
     }
}
