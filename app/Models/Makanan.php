<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Makanan extends Model
{
    use HasFactory;

    protected $table = 'makanan'; // nama tabel di database
    protected $fillable = ['nama_makanan', 'foto', 'harga', 'deskripsi']; // kolom yang bisa diisi
}
