<?php

namespace Services\Lp3Core\App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Services\Lp3Core\App\Http\Requests\Yard\IndexRequest;
use Services\Lp3Core\App\Http\Requests\Yard\ShowRequest;
use Services\Lp3Core\App\Http\Requests\Yard\StoreRequest;
use Services\Lp3Core\App\Http\Requests\Yard\UpdateRequest;
use Services\Lp3Core\App\Http\Resources\Yard\DestroyResource;
use Services\Lp3Core\App\Http\Resources\Yard\IndexResourceCollection;
use Services\Lp3Core\App\Http\Resources\Yard\ShowResource;
use Services\Lp3Core\App\Http\Resources\Yard\StoreResource;
use Services\Lp3Core\App\Http\Resources\Yard\UpdateResource;
use Services\Lp3Core\App\Http\UseCases\Yard\Destroy;
use Services\Lp3Core\App\Http\UseCases\Yard\Index;
use Services\Lp3Core\App\Http\UseCases\Yard\Show;
use Services\Lp3Core\App\Http\UseCases\Yard\Store;
use Services\Lp3Core\App\Http\UseCases\Yard\Update;
use Services\Lp3Core\App\Http\Requests\Yard\DestroyRequest;
use Services\Lp3Core\App\Http\UseCases\Yard\Exceptions\YardDeleteException;
use Services\Lp3Core\App\Http\UseCases\Yard\Exceptions\YardSaveException;
use Symfony\Component\HttpFoundation\Response;

/**
 * ヤードコントローラー
 */
class YardController extends Controller
{
    /**
     * ヤードの一覧の取得
     *
     * @param Index $useCase
     * @return IndexResourceCollection
     * @apiResourceCollection Services\Lp3Core\App\Http\Resources\Yard\IndexResourceCollection
     * @apiResourceModel Services\Lp3Core\App\Models\Yard with=yardGroup
     */
    public function index(IndexRequest $request, Index $useCase): IndexResourceCollection
    {
        $requestData = $request->only([
            'nameKeyWords',
            'yardStatus',
            'capacities'
        ]);
        return new IndexResourceCollection($useCase($requestData));
    }

    /**
     * ヤードの詳細情報の取得
     *
     * @param ShowRequest $request
     * @param Show $useCase
     * @return ShowResource
     * @apiResource Services\Lp3Core\App\Http\Resources\Yard\ShowResource
     * @apiResourceModel Services\Lp3Core\App\Models\Yard with=representativeInYardGroup,cargoTypes,yardGroup,country
     */
    public function show(ShowRequest $request, Show $useCase, $id): ShowResource
    {
        return new ShowResource($useCase($id));
    }

    /**
     * ヤードの作成
     *
     * @param StoreRequest $request
     * @param Store $useCase
     * @return StoreResource
     * @apiResource Services\Lp3Core\App\Http\Resources\Yard\StoreResource
     * @apiResourceModel Services\Lp3Core\App\Models\Yard with=representativeInYardGroup,cargoTypes,yardGroup,country
     */
    public function store(StoreRequest $request, Store $useCase): StoreResource
    {
        return new StoreResource($useCase($request->makeArraysForUseCase()));
    }

    /**
     * ヤードの更新
     *
     * @param UpdateRequest $request
     * @param Update $useCase
     * @return UpdateResource
     * @apiResource Services\Lp3Core\App\Http\Resources\Yard\UpdateResource
     * @apiResourceModel Services\Lp3Core\App\Models\Yard with=representativeInYardGroup,cargoTypes,yardGroup,country
     */
    public function update(UpdateRequest $request, Update $useCase, $id): UpdateResource | JsonResponse
    {
        try {
            $targetYard = $request->getTargetYard();
            $requestData = $request->makeArraysForUseCase($targetYard);
            return new UpdateResource($useCase($targetYard, $requestData));
        } catch (YardSaveException $e) {
            Log::error($e);
            return response()->json(['message' => $this->createErrorResponseMessage($e->getMessage())], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * ヤードの削除
     *
     * @param DestroyRequest $request
     * @param Destroy $useCase
     * @return DestroyResource
     * @apiResource Services\Lp3Core\App\Http\Resources\Yard\DestroyResource
     * @apiResourceModel Services\Lp3Core\App\Models\Yard with=yardGroup
     */
    public function destroy(DestroyRequest $request, Destroy $useCase, $id): DestroyResource | JsonResponse
    {
        try {
            return new DestroyResource($useCase($id));
        } catch (YardDeleteException $e) {
            Log::error($e);
            return response()->json(['message' => $this->createErrorResponseMessage($e->getMessage())], Response::HTTP_BAD_REQUEST);
        }
    }

    private function createErrorResponseMessage($errorMessage)
    {
        // 一旦エラーメッセージは以下で書いております。（4/27：中嶋）
        switch ($errorMessage) {
            case YardSaveException::CHANGE_BELONGING_TO_ERROR:
                return "代表ヤードであるため所属先ヤードグループを変更できません";
                break;
            case YardSaveException::INACTIVE_REPRESENTATIVE_YARD_ERROR:
                return "代表ヤードであるため無効にできません";
                break;
            case YardDeleteException::DELETE_USED_YARD_ERROR:
                return "使用履歴があるもしくは代表ヤードであるため削除できません";
                break;
        }
    }
}
