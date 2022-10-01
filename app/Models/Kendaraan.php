<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;
    protected $collection = 'kendaraan';
    protected $primaryKey = '_id';
    protected $fillable = [
        'merk',
        'warna',
        'tahun_keluaran',
        'harga',
        'tipe',
        'ref_id',
    ];
}