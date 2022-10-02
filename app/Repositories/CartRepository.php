<?php

namespace App\Repositories;

use App\Models\Cart;
use App\Models\User;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;

class CartRepository extends BaseRepository
{
    protected $modelUser;

    public function __construct(
        Cart $model,
        User $modelUser,
    )
    {
        $this->model = $model;
        $this->modelUser = $modelUser;
    }

    public function getByKendaraanId($kendaraan_id)
    {
        $data = $this->model->where('user_id', Auth::guard('api')->user()->id)->where('kendaraan_id', $kendaraan_id)->first();

        return $data;
    }

    public function show()
    {
        $user = $this->modelUser->find(Auth::guard('api')->user()->id);
        $data['total_harga'] = $user->total_price;
        $data['items'] = array();
        $carts = $this->model->where('user_id', Auth::guard('api')->user()->id)->get();
        foreach ($carts as $value) {
            $item['id'] = $value->id;
            $item['kendaraan_id'] = $value->kendaraan_id;
            $item['qty'] = $value->qty;
            $item['harga'] = $value->kendaraan->harga;
            $item['total_harga_satuan'] = $value->total_price;
            array_push($data['items'], $item);
        }

        return $data;
    }

    public function getByUserId()
    {
        $data = $this->model->where('user_id', Auth::guard('api')->user()->id)->orderBy('created_at', 'desc')->get();

        return $data;
    }
}
