<?php

namespace App\Http\Controllers;

use App\Http\Requests\MobilRequest;
use App\Services\MobilService;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    protected $service;
    public function __construct(
        MobilService $service
    )
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->index();
    }

    public function store(MobilRequest $request)
    {
        return $this->service->store($request);
    }

    public function update(MobilRequest $request, $id)
    {
        return $this->service->update($request, $id);
    }

    public function show($id)
    {
        return $this->service->show($id);
    }

    public function destroy($id)
    {
        return $this->service->destroy($id);
    }
}
