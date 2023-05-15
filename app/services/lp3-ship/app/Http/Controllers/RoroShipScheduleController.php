<?php

namespace Services\Lp3Ship\App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Services\Lp3Ship\App\Http\Requests\RoroShipSchedule\CheckUniqueRequest;
use Services\Lp3Ship\App\Http\Requests\RoroShipSchedule\UpdateHistoryRequest;
use Services\Lp3Ship\App\Http\Resources\RoroShipSchedule\CheckUniqueResource;
use Services\Lp3Ship\App\Http\Resources\RoroShipSchedule\UpdateHistoryResourceCollection;
use Services\Lp3Ship\App\Http\UseCases\RoroShipSchedule\CheckUnique;
use Services\Lp3Ship\App\Http\Requests\RoroShipSchedule\IndexRequest;
use Services\Lp3Ship\App\Http\Requests\RoroShipSchedule\StoreRequest;
use Services\Lp3Ship\App\Http\Requests\RoroShipSchedule\UpdateRequest;
use Services\Lp3Ship\App\Http\Requests\RoroShipSchedule\DestroyRequest;
use Services\Lp3Ship\App\Http\Requests\RoroShipSchedule\ShowRequest;
use Services\Lp3Ship\App\Http\Resources\RoroShipSchedule\IndexResourceCollection;
use Services\Lp3Ship\App\Http\Resources\RoroShipSchedule\StoreResource;
use Services\Lp3Ship\App\Http\Resources\RoroShipSchedule\ShowResource;
use Services\Lp3Ship\App\Http\Resources\RoroShipSchedule\UpdateResource;
use Services\Lp3Ship\App\Http\Resources\RoroShipSchedule\DestroyResource;
use Services\Lp3Ship\App\Http\UseCases\RoroShipSchedule\Index;
use Services\Lp3Ship\App\Http\UseCases\RoroShipSchedule\Update;
use Services\Lp3Ship\App\Http\UseCases\RoroShipSchedule\Store;
use Services\Lp3Ship\App\Http\UseCases\RoroShipSchedule\Show;
use Services\Lp3Ship\App\Http\UseCases\RoroShipSchedule\Destroy;
use Services\Lp3Ship\App\Exceptions\ShipScheduleSaveException;
use Services\Lp3Ship\App\Http\UseCases\RoroShipSchedule\UpdateHistory;

/**
 * RORO船スケジュールコントローラー
 */
class RoroShipScheduleController extends Controller
{
    /**
     * RORO船スケジュールの一覧の取得
     *
     * @param IndexRequest $request
     * @param Index $useCase
     * @return IndexResourceCollection
     * @apiResourceCollection Services\Lp3Ship\App\Http\Resources\RoroShipSchedule\IndexResourceCollection
     * @apiResourceModel Services\Lp3Ship\App\Models\ShipSchedule
     */
    public function index(IndexRequest $request, Index $useCase): IndexResourceCollection
    {
        return new IndexResourceCollection($useCase($request->all()));
    }

    /**
     * RORO船スケジュールの新規作成
     *
     * @param StoreRequest $request
     * @param Store $useCase
     * @return StoreResource|JsonResponse
     * @apiResource Services\Lp3Ship\App\Http\Resources\RoroShipSchedule\StoreResource
     * @apiResourceModel Services\Lp3Ship\App\Models\ShipSchedule
     * @response 201
     */
    public function Store(storeRequest $request, store $useCase): StoreResource|JsonResponse
    {
        try {
            return new StoreResource($useCase($request->all()));
        } catch (ShipScheduleSaveException $e) {
            return response()->json(['error' => $e->getMessage()], $e->getCode());
        }
    }

    /**
     * RORO船スケジュールの詳細
     *
     * @param ShowRequest $request
     * @param Show $useCase
     * @return ShowResource
     * @apiResource Services\Lp3Ship\App\Http\Resources\RoroShipSchedule\ShowResource
     * @apiResourceModel Services\Lp3Ship\App\Models\ShipSchedule
     */
    public function show(ShowRequest $request, Show $useCase, $id): ShowResource
    {
        return new ShowResource($useCase($id));
    }

    /**
     * RORO船スケジュールの更新
     *
     * @param UpdateRequest $request
     * @param Update $useCase
     * @return UpdateResource|JsonResponse
     * @apiResource Services\Lp3Ship\App\Http\Resources\RoroShipSchedule\UpdateResource
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
     * RORO船スケジュールの削除
     *
     * @param DestroyRequest $request
     * @param Destroy $useCase
     * @return DestroyResource
     * @apiResource Services\Lp3Ship\App\Http\Resources\RoroShipSchedule\DestroyResource
     * @apiResourceModel Services\Lp3Ship\App\Models\ShipSchedule
     */
    public function destroy(DestroyRequest $request, Destroy $useCase, $id): DestroyResource
    {
        return new DestroyResource($useCase($id));
    }

    /**
     * RORO船スケジュールのユニークチェック
     *
     * @param CheckUniqueRequest $request
     * @param CheckUnique $useCase
     * @return CheckUniqueResource
     * @apiResource Services\Lp3Ship\App\Http\Resources\RoroShipSchedule\CheckUniqueResource
     * @apiResourceModel Services\Lp3Ship\App\Models\ShipSchedule
     */
    public function checkUnique(CheckUniqueRequest $request, CheckUnique $useCase): CheckUniqueResource
    {
        return new CheckUniqueResource($useCase($request->all()));
    }

    /**
     * RORO船スケジュールの変更履歴の一覧の取得
     *
     * @param UpdateHistoryRequest $request
     * @param UpdateHistory $useCase
     * @param int $id
     * @return UpdateHistoryResourceCollection
     * @apiResourceCollection Services\Lp3Ship\App\Http\Resources\RoroShipSchedule\UpdateHistoryResourceCollection
     * @apiResourceModel Services\Lp3Ship\App\Models\RoroShipSchedule
     */
    public function updateHistory(UpdateHistoryRequest $request, UpdateHistory $useCase, $id): UpdateHistoryResourceCollection
    {
        return new UpdateHistoryResourceCollection($useCase($id));
    }
}
