<?php

namespace Services\Lp3Ship\App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Services\Lp3Ship\App\Exceptions\ShipScheduleSaveException;
use Services\Lp3Ship\App\Http\Requests\ContainerShipSchedule\CheckUniqueRequest;
use Services\Lp3Ship\App\Http\Requests\ContainerShipSchedule\UpdateHistoryRequest;
use Services\Lp3Ship\App\Http\Resources\ContainerShipSchedule\CheckUniqueResource;
use Services\Lp3Ship\App\Http\Resources\ContainerShipSchedule\UpdateHistoryResourceCollection;
use Services\Lp3Ship\App\Http\UseCases\ContainerShipSchedule\CheckUnique;
use Services\Lp3Ship\App\Http\Requests\ContainerShipSchedule\IndexRequest;
use Services\Lp3Ship\App\Http\Requests\ContainerShipSchedule\StoreRequest;
use Services\Lp3Ship\App\Http\Requests\ContainerShipSchedule\UpdateRequest;
use Services\Lp3Ship\App\Http\Requests\ContainerShipSchedule\DestroyRequest;
use Services\Lp3Ship\App\Http\Requests\ContainerShipSchedule\ShowRequest;
use Services\Lp3Ship\App\Http\Resources\ContainerShipSchedule\IndexResourceCollection;
use Services\Lp3Ship\App\Http\Resources\ContainerShipSchedule\StoreResource;
use Services\Lp3Ship\App\Http\Resources\ContainerShipSchedule\ShowResource;
use Services\Lp3Ship\App\Http\Resources\ContainerShipSchedule\UpdateResource;
use Services\Lp3Ship\App\Http\Resources\ContainerShipSchedule\DestroyResource;
use Services\Lp3Ship\App\Http\UseCases\ContainerShipSchedule\Index;
use Services\Lp3Ship\App\Http\UseCases\ContainerShipSchedule\Update;
use Services\Lp3Ship\App\Http\UseCases\ContainerShipSchedule\Store;
use Services\Lp3Ship\App\Http\UseCases\ContainerShipSchedule\Show;
use Services\Lp3Ship\App\Http\UseCases\ContainerShipSchedule\Destroy;
use Illuminate\Support\Facades\Log;
use Services\Lp3Ship\App\Http\UseCases\ContainerShipSchedule\UpdateHistory;

/**
 * コンテナ船スケジュールコントローラー
 */
class ContainerShipScheduleController extends Controller
{
    /**
     * コンテナ船スケジュールの一覧の取得
     *
     * @param IndexRequest $request
     * @param Index $useCase
     * @return IndexResourceCollection
     * @apiResourceCollection Services\Lp3Ship\App\Http\Resources\ContainerShipSchedule\IndexResourceCollection
     * @apiResourceModel Services\Lp3Ship\App\Models\ShipSchedule
     */
    public function index(IndexRequest $request, Index $useCase): IndexResourceCollection
    {
        return new IndexResourceCollection($useCase($request->all()));
    }

    /**
     * コンテナ船スケジュールの新規作成
     *
     * @param StoreRequest $request
     * @param Store $useCase
     * @return StoreResource|JsonResponse
     * @apiResource Services\Lp3Ship\App\Http\Resources\ContainerShipSchedule\StoreResource
     * @apiResourceModel Services\Lp3Ship\App\Models\ShipSchedule
     * @response 201
     */
    public function store(storeRequest $request, store $useCase): StoreResource|JsonResponse
    {
        try {
            return new StoreResource($useCase($request->all()));
        } catch (ShipScheduleSaveException $e) {
            return response()->json(['error' => $e->getMessage()], $e->getCode());
        }
    }

    /**
     * コンテナ船スケジュールの詳細
     *
     * @param ShowRequest $request
     * @param Show $useCase
     * @return ShowResource
     * @apiResource Services\Lp3Ship\App\Http\Resources\ContainerShipSchedule\ShowResource
     * @apiResourceModel Services\Lp3Ship\App\Models\ShipSchedule
     */
    public function show(ShowRequest $request, Show $useCase, $id): ShowResource
    {
        return new ShowResource($useCase($id));
    }

    /**
     * コンテナ船スケジュールの更新
     *
     * @param UpdateRequest $request
     * @param Update $useCase
     * @return UpdateResource|JsonResponse
     * @apiResource Services\Lp3Ship\App\Http\Resources\ContainerShipSchedule\UpdateResource
     * @apiResourceModel Services\Lp3Ship\App\Models\ShipSchedule
     */
    public function update(UpdateRequest $request, Update $useCase, $id): UpdateResource|JsonResponse
    {
        try {
            return new UpdateResource($useCase($id, $request->all()));
        } catch (ShipScheduleSaveException $e) {
            return response()->json(['error' => $e->getMessage()], $e->getCode());
        }
    }

    /**
     * コンテナ船スケジュールの削除
     *
     * @param DestroyRequest $request
     * @param Destroy $useCase
     * @return DestroyResource
     * @apiResource Services\Lp3Ship\App\Http\Resources\ContainerShipSchedule\DestroyResource
     * @apiResourceModel Services\Lp3Ship\App\Models\ShipSchedule
     */
    public function destroy(DestroyRequest $request, Destroy $useCase, $id): DestroyResource
    {
        return new DestroyResource($useCase($id));
    }

    /**
     * コンテナ船スケジュールのユニークチェック
     *
     * @param CheckUniqueRequest $request
     * @param CheckUnique $useCase
     * @return CheckUniqueResource
     * @apiResource Services\Lp3Ship\App\Http\Resources\ContainerShipSchedule\CheckUniqueResource
     * @apiResourceModel Services\Lp3Ship\App\Models\ShipSchedule
     */
    public function checkUnique(CheckUniqueRequest $request, checkUnique $useCase): CheckUniqueResource
    {
        return new CheckUniqueResource($useCase($request->all()));
    }

    /**
     * コンテナ船スケジュールの変更履歴の一覧の取得
     *
     * @param UpdateHistoryRequest $request
     * @param UpdateHistory $useCase
     * @param int $id
     * @return UpdateHistoryResourceCollection
     * @apiResourceCollection Services\Lp3Ship\App\Http\Resources\ContainerShipSchedule\UpdateHistoryResourceCollection
     * @apiResourceModel Services\Lp3Ship\App\Models\ContShipSchedule
     */
    public function updateHistory(UpdateHistoryRequest $request, UpdateHistory $useCase, $id): UpdateHistoryResourceCollection
    {
        return new UpdateHistoryResourceCollection($useCase($id));
    }
}
