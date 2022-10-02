<?php

namespace App\Services;

use App\Repositories\CartRepository;
use App\Repositories\KendaraanRepository;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\Log;
use stdClass;

class CartService extends BaseService
{
    protected $repo;
    protected $repoKendaraan;

    public function __construct(
        CartRepository $repo,
        KendaraanRepository $repoKendaraan,
    ) {
        parent::__construct();
        $this->repo = $repo;
        $this->repoKendaraan = $repoKendaraan;
    }

    public function updateOrCreate($request)
    {
        try {
            $dataToCheck['kendaraan_id'] = $request->kendaraan_id;
            $dataToInput = $request->all();
            $dataToInput['user_id'] = $this->user->id;
            if ($request->qty == 0) {
                $item = $this->repo->getByKendaraanId($request->kendaraan_id);
                $this->repo->delete($item->id);

                return $this->responseMessage(__('content.message.delete.success'), 200, true, new stdClass());
            }
            $checkItem = $this->repoKendaraan->getById($request->kendaraan_id);
            if ($request->qty > $checkItem->stok) {
                return $this->responseMessage(__('content.message.cart.not_available'), 400, false, new stdClass());
            }

            $createdItem = $this->repo->updateOrCreate($dataToCheck, $dataToInput);

            return $this->responseMessage(__('content.message.create.success'), 200, true, $createdItem);
        } catch (Exception $exc) {
            Log::error($exc);
            return $this->responseMessage(__('content.message.update.failed'), 400, false);
        }
    }

    public function show()
    {
        try {
            $data = $this->repo->show();

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
