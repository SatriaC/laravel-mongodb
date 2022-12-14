<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\HybridRelations;
use Jenssegers\Mongodb\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory, HybridRelations;
    protected $collection = 'kendaraan';
    protected $primaryKey = '_id';
    protected $fillable = [
        'merk',
        'warna',
        'tahun_keluaran',
        'harga',
        'tipe',
        'mobil_id',
        'motor_id',
        'stok',
    ];

    protected $appends = array('tipe_name');

    public function mobil()
    {
        return $this->belongsTo(Mobil::class, 'mobil_id');
    }

    public function getTipeNameAttribute()
    {
        switch ($this->tipe) {

            case 1:
                return 'Mobil';
                break;

            case 2:
                return 'Motor';
                break;
        }
    }

}
