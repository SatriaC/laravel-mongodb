<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $collection = 'carts';
    protected $primaryKey = '_id';
    protected $fillable = [
        'user_id',
        'kendaraan_id',
        'qty',
    ];

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class, 'kendaraan_id');
    }

    public function getTotalPriceAttribute()
    {
        $total = $this->kendaraan->harga * $this->qty;

        return $total;
    }
}
