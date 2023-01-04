<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wisata extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'kota',
        'harga_tiket',
        'deskripsi',
        'image',
    ];
}
