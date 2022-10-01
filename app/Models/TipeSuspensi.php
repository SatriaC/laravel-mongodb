<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class TipeSuspensi extends Model
{
    use HasFactory;
    protected $collection = 'tipe_suspensi';
    protected $primaryKey = '_id';
    protected $fillable = [
        'nama'
    ];
}
