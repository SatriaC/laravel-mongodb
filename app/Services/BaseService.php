<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class BaseService
{
    protected $env;
    protected $productionEnv = 'production';
    protected $connection = 'mongodb';
    protected $user;

    public function __construct()
    {
        $this->env = config('app.env');
        $this->user = Auth::guard('api')->user();
    }

    public function responseMessage($message, $statusCode, $isSuccess = false, $data = [])
    {
        return response()->json(
            [
                "message" => $message,
                "success" => $isSuccess,
                "data" => $data
            ],
            $statusCode
        );
    }
}
