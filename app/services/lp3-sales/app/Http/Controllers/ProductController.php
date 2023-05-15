<?php

namespace Services\Lp3Sales\App\Http\Controllers;

use Services\Lp3Sales\App\Http\Requests\Product\IndexRequest;
use Services\Lp3Sales\App\Http\Requests\Product\ShowRequest;
use Services\Lp3Sales\App\Http\Requests\Product\StoreRequest;
use Services\Lp3Sales\App\Http\Requests\Product\UpdateRequest;
use Services\Lp3Sales\App\Http\Requests\Product\DestroyRequest;
use Services\Lp3Sales\App\Http\Requests\Product\RestoreRequest;
use Services\Lp3Sales\App\Http\Requests\Product\UpdateHistoryRequest;

use Services\Lp3Sales\App\Http\Resources\Product\IndexResourceCollection;
use Services\Lp3Sales\App\Http\Resources\Product\ShowResource;
use Services\Lp3Sales\App\Http\Resources\Product\StoreResource;
use Services\Lp3Sales\App\Http\Resources\Product\UpdateResource;
use Services\Lp3Sales\App\Http\Resources\Product\DestroyResource;
use Services\Lp3Sales\App\Http\Resources\Product\RestoreResource;
use Services\Lp3Sales\App\Http\Resources\Product\UpdateHistoryResourceCollection;

use Services\Lp3Sales\App\Http\UseCases\Product\Index;
use Services\Lp3Sales\App\Http\UseCases\Product\Show;
use Services\Lp3Sales\App\Http\UseCases\Product\Store;
use Services\Lp3Sales\App\Http\UseCases\Product\Update;
use Services\Lp3Sales\App\Http\UseCases\Product\Destroy;
use Services\Lp3Sales\App\Http\UseCases\Product\Restore;
use Services\Lp3Sales\App\Http\UseCases\Product\UpdateHistory;

/**
 * 商品コントローラー
 */
class ProductController extends Controller
{
    /**
     * 商品の一覧の取得
     *
     * @param IndexRequest $request
     * @param Index $useCase
     * @return IndexResourceCollection
     * @apiResourceCollection Services\Lp3Sales\App\Http\Resources\Product\IndexResourceCollection
     * @apiResourceModel Services\Lp3Sales\App\Models\Product
     */
    public function index(IndexRequest $request, Index $useCase): IndexResourceCollection
    {
        return new IndexResourceCollection($useCase());
    }

    /**
     * 商品の詳細
     *
     * @param ShowRequest $request
     * @param Show $useCase
     * @param int $id
     * @return ShowResource
     * @apiResource Services\Lp3Sales\App\Http\Resources\Product\ShowResource
     * @apiResourceModel Services\Lp3Sales\App\Models\Product
     */
    public function show(ShowRequest $request, Show $useCase, $id): ShowResource
    {
        return new ShowResource($useCase($id));
    }

    /**
     * 商品の新規作成
     *
     * @param StoreRequest $request
     * @param Store $useCase
     * @return StoreResource
     * @apiResource Services\Lp3Sales\App\Http\Resources\Product\StoreResource
     * @apiResourceModel Services\Lp3Sales\App\Models\Product
     */
    public function store(StoreRequest $request, Store $useCase): StoreResource
    {
        return new StoreResource($useCase());
    }

    /**
     * 商品の更新
     *
     * @param UpdateRequest $request
     * @param Update $useCase
     * @param int $id
     * @return UpdateResource
     * @apiResource Services\Lp3Sales\App\Http\Resources\Product\UpdateResource
     * @apiResourceModel Services\Lp3Sales\App\Models\Product
     */
    public function update(UpdateRequest $request, Update $useCase, $id): UpdateResource
    {
        return new UpdateResource($useCase($id));
    }

    /**
     * 商品の削除
     *
     * @param DestroyRequest $request
     * @param Destroy $useCase
     * @param int $id
     * @return DestroyResource
     * @apiResource Services\Lp3Sales\App\Http\Resources\Product\DestroyResource
     * @apiResourceModel Services\Lp3Sales\App\Models\Product
     */
    public function destroy(DestroyRequest $request, Destroy $useCase, $id): DestroyResource
    {
        return new DestroyResource($useCase($id));
    }

    /**
     * 商品の復元
     *
     * @param RestoreRequest $request
     * @param Restore $useCase
     * @param int $id
     * @return RestoreResource
     * @apiResource Services\Lp3Sales\App\Http\Resources\Product\RestoreResource
     * @apiResourceModel Services\Lp3Sales\App\Models\Product
     */
    public function restore(RestoreRequest $request, Restore $useCase, $id): RestoreResource
    {
        return new RestoreResource($useCase($id));
    }

    /**
     * 商品の変更履歴の一覧の取得
     *
     * @param UpdateHistoryRequest $request
     * @param UpdateHistory $useCase
     * @param int $id
     * @return UpdateHistoryResourceCollection
     * @apiResourceCollection Services\Lp3Sales\App\Http\Resources\Product\UpdateHistoryResourceCollection
     * @apiResourceModel Services\Lp3Sales\App\Models\Product
     */
    public function updateHistory(UpdateHistoryRequest $request, UpdateHistory $useCase, $id): UpdateHistoryResourceCollection
    {
        return new UpdateHistoryResourceCollection($useCase($id));
    }
}
