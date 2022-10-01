<?php

namespace App\Repositories;

use App\Models\TipeSuspensi;
use App\Repositories\BaseRepository;

class TipeSuspensiRepository extends BaseRepository
{
    public function __construct(TipeSuspensi $model)
    {
        $this->model = $model;
    }
}
