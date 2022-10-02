<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $collection = 'orders';
    protected $primaryKey = '_id';
    protected $fillable = [
        'user_id',
        'tax',
        'gross_price',
        'shipping_cost',
        'discount',
        'total_price'
    ];

}
