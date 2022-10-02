<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $collection = 'order_items';
    protected $primaryKey = '_id';
    protected $fillable = [
        'order_id',
        'kendaraan_id',
        'qty'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

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
