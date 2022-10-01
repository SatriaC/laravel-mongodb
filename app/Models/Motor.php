<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Motor extends Model
{
    use HasFactory;
    protected $collection = 'motor';
    protected $primaryKey = '_id';
    protected $fillable = [
        'mesin',
        'tipe_suspensi',
        'tipe_transmisi'
    ];
}
