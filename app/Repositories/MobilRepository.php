<?php

namespace App\Repositories;

use App\Models\Mobil;
use App\Repositories\BaseRepository;

class MobilRepository extends BaseRepository
{
    public function __construct(Mobil $model)
    {
        $this->model = $model;
    }
}
