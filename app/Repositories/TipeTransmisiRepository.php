<?php

namespace App\Repositories;

use App\Models\TipeTransmisi;
use App\Repositories\BaseRepository;

class TipeTransmisiRepository extends BaseRepository
{
    public function __construct(TipeTransmisi $model)
    {
        $this->model = $model;
    }
}
