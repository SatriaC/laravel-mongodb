<?php

namespace App\Http\Controllers;

use App\Http\Requests\KendaraanRequest;
use App\Services\KendaraanService;

class KendaraanController extends Controller
{
    protected $service;
    public function __construct(
        KendaraanService $service
    )
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->index();
    }

    public function store(KendaraanRequest $request)
    {
        return $this->service->store($request);
    }

    public function update(KendaraanRequest $request, $id)
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
