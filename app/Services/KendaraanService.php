<?php

namespace App\Services;

use App\Helpers\Pagination;
use App\Repositories\KendaraanRepository;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\Log;

class KendaraanService extends BaseService
{
    protected $repo;

    public function __construct(
        KendaraanRepository $repo
    ) {
        parent::__construct();
        $this->repo = $repo;
    }

    public function index($request)
    {
        try {
            $item = $this->repo->getAll($request);

            return Pagination::paginate($item, $request);
        } catch (Exception $exc) {
            Log::error($exc);
            return $this->responseMessage(__('content.message.read.failed'), 400, false);
        }
    }

    public function store($request)
    {
        try {
            $data = $request->all();
            $item = $this->repo->create($data);

            return $this->responseMessage(__('content.message.create.success'), 200, true, $item);
        } catch (Exception $exc) {
            Log::error($exc);
            return $this->responseMessage(__('content.message.create.failed'), 400, false);
        }
    }

    public function update($request, $id)
    {
        try {
            $data = $request->all();
            $this->repo->update($data, $id);

            $item = $this->repo->getById($id);

            return $this->responseMessage(__('content.message.update.success'), 200, true, $item);
        } catch (Exception $exc) {
            Log::error($exc);
            return $this->responseMessage(__('content.message.update.failed'), 400, false);
        }
    }

    public function show($id)
    {
        try {
            $data = $this->repo->getById($id);

            return $this->responseMessage(__('content.message.read.success'), 200, true, $data);
        } catch (Exception $exc) {
            Log::error($exc);
            return $this->responseMessage(__('content.message.read.failed'), 400, false);
        }
    }

    public function destroy($id)
    {
        try {
            $this->repo->delete($id);
            return $this->responseMessage(__('content.message.delete.success'), 200, true);
        } catch (\Throwable $exc) {
            Log::error($exc);
            return $this->responseMessage(__('content.message.delete.failed'), 400, false);
        }
    }
}
