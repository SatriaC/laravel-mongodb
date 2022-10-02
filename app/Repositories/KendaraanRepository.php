<?php

namespace App\Repositories;

use App\Models\Kendaraan;
use App\Repositories\BaseRepository;
use Carbon\Carbon;

class KendaraanRepository extends BaseRepository
{
    public function __construct(Kendaraan $model)
    {
        $this->model = $model;
    }

    public function getAll($request){
        $data = $this->model->orderBy('kendaraan.created_at', 'desc');

        if (isset($request->tipe)) {
            $data->where('tipe', (int)$request->tipe);
        }

        return $data;
    }

    public function getById($id){
        $data = $this->model->orderBy('created_at', 'desc')->get()->first();

        return $data;
    }
}
