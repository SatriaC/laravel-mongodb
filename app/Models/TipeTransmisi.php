<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class TipeTransmisi extends Model
{
    use HasFactory;
    protected $collection = 'tipe_transmisi';
    protected $primaryKey = '_id';
    protected $fillable = [
        'nama'
    ];
    public $timestamps = 'false';
}
