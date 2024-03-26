<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koleksipribadi extends Model
{
    use HasFactory;
    protected $table = 'koleksipribadi';
    protected $fillable =[
        'user_id',
        'buku_id'
    ];
}
