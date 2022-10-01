<?php

namespace App\Repositories;

use App\Models\Kendaraan;
use App\Repositories\BaseRepository;

class KendaraanRepository extends BaseRepository
{
    public function __construct(Kendaraan $model)
    {
        $this->model = $model;
    }
}
