<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\HybridRelations;
use Jenssegers\Mongodb\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory, HybridRelations;
    protected $collection = 'mobil';
    protected $primaryKey = '_id';
    protected $fillable = [
        'mesin',
        'kapasitas',
        'tipe'
    ];

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class, 'mobil_id');
    }
}
