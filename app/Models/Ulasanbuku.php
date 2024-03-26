<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasanbuku extends Model
{
    use HasFactory;
    protected $table = 'ulasanbuku';
    protected $fillable =[
        'user_id',
        'buku_id',
        'ulasan',
        'rating'
    ];
}
