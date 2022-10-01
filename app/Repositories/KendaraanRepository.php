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
        $data = $this->model;

        if (isset($request->tipe)) {
            $data->where('tipe', $request->tipe);
        }

        if (isset($request->start_date) && isset($request->end_date)) {
            $start_date = Carbon::parse($request->start_date)->startOfDay();
            $end_date = Carbon::parse($request->end_date)->endOfDay();
            $data = $data->whereBetween('kendaraan.created_at', array($start_date, $end_date));
        }

        if (isset($request->sort)) {
            switch ($request->sort) {
                case 1:
                    $data->orderBy('kendaraan.created_at', 'asc');
                    break;

                case 2:
                    $data->orderBy('kendaraan.created_at', 'desc');
                    break;
                default:
                    break;
            }
        } else {
            $data->orderBy('kendaraan.created_at', 'desc');
        }

        return $data;
    }

    public function getById($id){
        $data = $this->model->orderBy('created_at', 'desc')->get()->first();

        return $data;
    }
}
