<?php

namespace Services\Lp3Core\App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Services\Lp3Core\App\Http\Requests\YardGroup\DestroyRequest;
use Services\Lp3Core\App\Http\Requests\YardGroup\IndexRequest;
use Services\Lp3Core\App\Http\Requests\YardGroup\ShowRequest;
use Services\Lp3Core\App\Http\Requests\YardGroup\StoreRequest;
use Services\Lp3Core\App\Http\Requests\YardGroup\UpdateRequest;
use Services\Lp3Core\App\Http\Resources\YardGroup\DestroyResource;
use Services\Lp3Core\App\Http\Resources\YardGroup\IndexResourceCollection;
use Services\Lp3Core\App\Http\Resources\YardGroup\ShowResource;
use Services\Lp3Core\App\Http\Resources\YardGroup\StoreResource;
use Services\Lp3Core\App\Http\Resources\YardGroup\UpdateResource;
use Services\Lp3Core\App\Http\UseCases\YardGroup\Destroy;
use Services\Lp3Core\App\Http\UseCases\YardGroup\Exceptions\YardGroupDeleteException;
use Services\Lp3Core\App\Http\UseCases\YardGroup\Exceptions\YardGroupSaveException;
use Services\Lp3Core\App\Http\UseCases\YardGroup\Index;
use Services\Lp3Core\App\Http\UseCases\YardGroup\Show;
use Services\Lp3Core\App\Http\UseCases\YardGroup\Store;
use Services\Lp3Core\App\Http\UseCases\YardGroup\Update;
use Symfony\Component\HttpFoundation\Response;

/**
 * ヤードグループコントローラー
 */
class YardGroupController extends Controller
{
    /**
     * ヤードグループの一覧の取得
     *
     * @param Index $useCase
     * @return IndexResourceCollection
     * @apiResourceCollection Services\Lp3Core\App\Http\Resources\YardGroup\IndexResourceCollection
     * @apiResourceModel Services\Lp3Core\App\Models\YardGroup with=representativeYard,yards
     */
    public function index(IndexRequest $request, Index $useCase): IndexResourceCollection
    {
        // データ上は必ずどこかのヤードグループに所属するため、ヤードを検索する場合はyardGroupのindexを使用する。
        $requestData = $request->only([
            'nameKeyWords',
            'yardStatus',
            'capacities',
            'mailKeyWords',
            'defaultPolId',
            'defaultCustomBrokerOfficeId'
        ]);

        return new IndexResourceCollection($useCase($requestData));
    }

    /**
     * ヤードグループの詳細情報の取得
     *
     * @param ShowRequest $request
     * @param Show $useCase
     * @return ShowResource
     * @apiResource Services\Lp3Core\App\Http\Resources\YardGroup\ShowResource
     * @apiResourceModel Services\Lp3Core\App\Models\YardGroup with=defaultPol,representativeYard,yards,managers,officeBusinessTypes,regularHolidays,irregularHolidays,irregularBusinessDays
     */
    public function show(ShowRequest $request, Show $useCase, $id): ShowResource
    {
        return new ShowResource($useCase($id));
    }

    /**
     * ヤードグループの作成
     *
     * @param StoreRequest $request
     * @param Store $useCase
     * @return StoreResource
     * @apiResource Services\Lp3Core\App\Http\Resources\YardGroup\StoreResource
     * @apiResourceModel Services\Lp3Core\App\Models\YardGroup with=defaultPol,representativeYard,yards,managers,officeBusinessTypes,regularHolidays,irregularHolidays,irregularBusinessDays
     */
    public function store(StoreRequest $request, Store $useCase): StoreResource | JsonResponse
    {
        try {
            return new StoreResource($useCase($request->makeArraysForUseCase()));
        } catch (YardGroupSaveException $e) {
            Log::error($e);
            return response()->json(['message' => $this->createErrorResponseMessage($e->getMessage())], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * ヤードグループの更新
     *
     * @param UpdateRequest $request
     * @param Update $useCase
     * @return UpdateResource
     * @apiResource Services\Lp3Core\App\Http\Resources\YardGroup\UpdateResource
     * @apiResourceModel Services\Lp3Core\App\Models\YardGroup with=defaultPol,representativeYard,yards,managers,officeBusinessTypes,regularHolidays,irregularHolidays,irregularBusinessDays
     */
    public function update(UpdateRequest $request, Update $useCase, $id): UpdateResource | JsonResponse
    {
        try {
            $targetYardGroup = $request->getTargetYardGroup();
            $requestData = $request->makeArraysForUseCase($targetYardGroup);
            return new UpdateResource($useCase($targetYardGroup, $requestData));
        } catch (YardGroupSaveException $e) {
            Log::error($e);
            return response()->json(['message' => $this->createErrorResponseMessage($e->getMessage())], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * ヤードグループの削除
     *
     * @param DestroyRequest $request
     * @param Destroy $useCase
     * @return DestroyResource
     * @apiResource Services\Lp3Core\App\Http\Resources\YardGroup\DestroyResource
     * @apiResourceModel Services\Lp3Core\App\Models\YardGroup with=representativeYard,yards
     */
    public function destroy(DestroyRequest $request, Destroy $useCase, $id): DestroyResource | JsonResponse
    {
        try {
            return new DestroyResource($useCase($id));
        } catch (YardGroupDeleteException $e) {
            Log::error($e);
            return response()->json(['message' => $this->createErrorResponseMessage($e->getMessage())], Response::HTTP_BAD_REQUEST);
        }
    }

    private function createErrorResponseMessage($errorMessage)
    {
        // 一旦エラーメッセージは以下で書いております。（4/26：中嶋）
        switch ($errorMessage) {
            case YardGroupSaveException::START_DATE_ERROR;
                return "定休日の有効期限開始日に誤りがあります。";
                break;
            case YardGroupSaveException::END_DATE_ERROR;
                return "定休日の有効期限終了日に誤りがあります。";
                break;
            case YardGroupDeleteException::HAS_ACTIVE_YARD_ERROR;
                return "ヤードが所属しているため削除できません。";
                break;
        }
    }
}
