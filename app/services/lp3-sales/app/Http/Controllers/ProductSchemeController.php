<?php

namespace Services\Lp3Sales\App\Http\Controllers;

use Services\Lp3Sales\App\Http\Requests\ProductScheme\IndexRequest;
use Services\Lp3Sales\App\Http\Requests\ProductScheme\ShowRequest;
use Services\Lp3Sales\App\Http\Requests\ProductScheme\StoreRequest;
use Services\Lp3Sales\App\Http\Requests\ProductScheme\UpdateRequest;
use Services\Lp3Sales\App\Http\Requests\ProductScheme\DestroyRequest;

use Services\Lp3Sales\App\Http\Resources\ProductScheme\IndexResourceCollection;
use Services\Lp3Sales\App\Http\Resources\ProductScheme\ShowResource;
use Services\Lp3Sales\App\Http\Resources\ProductScheme\StoreResource;
use Services\Lp3Sales\App\Http\Resources\ProductScheme\UpdateResource;
use Services\Lp3Sales\App\Http\Resources\ProductScheme\DestroyResource;

use Services\Lp3Sales\App\Http\UseCases\ProductScheme\Index;
use Services\Lp3Sales\App\Http\UseCases\ProductScheme\Show;
use Services\Lp3Sales\App\Http\UseCases\ProductScheme\Store;
use Services\Lp3Sales\App\Http\UseCases\ProductScheme\Update;
use Services\Lp3Sales\App\Http\UseCases\ProductScheme\Destroy;

/**
 * 商品スキームコントローラー
 */
class ProductSchemeController extends Controller
{
    /**
     * 商品スキームの一覧の取得
     *
     * @param IndexRequest $request
     * @param Index $useCase
     * @return IndexResourceCollection
     * @apiResourceCollection Services\Lp3Sales\App\Http\Resources\ProductScheme\IndexResourceCollection
     * @apiResourceModel Services\Lp3Sales\App\Models\ProductScheme
     */
    public function index(IndexRequest $request, Index $useCase): IndexResourceCollection
    {
        return new IndexResourceCollection($useCase());
    }

    /**
     * 商品スキームの詳細
     *
     * @param ShowRequest $request
     * @param Show $useCase
     * @param int $id
     * @return ShowResource
     * @apiResource Services\Lp3Sales\App\Http\Resources\ProductScheme\ShowResource
     * @apiResourceModel Services\Lp3Sales\App\Models\ProductScheme
     */
    public function show(ShowRequest $request, Show $useCase, $id): ShowResource
    {
        return new ShowResource($useCase($id));
    }

    /**
     * 商品スキームの新規作成
     *
     * @param StoreRequest $request
     * @param Store $useCase
     * @return StoreResource
     * @apiResource Services\Lp3Sales\App\Http\Resources\ProductScheme\StoreResource
     * @apiResourceModel Services\Lp3Sales\App\Models\ProductScheme
     */
    public function store(StoreRequest $request, Store $useCase): StoreResource
    {
        return new StoreResource($useCase());
    }

    /**
     * 商品スキームの更新
     *
     * @param UpdateRequest $request
     * @param Update $useCase
     * @param int $id
     * @return UpdateResource
     * @apiResource Services\Lp3Sales\App\Http\Resources\ProductScheme\UpdateResource
     * @apiResourceModel Services\Lp3Sales\App\Models\ProductScheme
     */
    public function update(UpdateRequest $request, Update $useCase, $id): UpdateResource
    {
        return new UpdateResource($useCase($id));
    }

    /**
     * 商品スキームの削除
     *
     * @param DestroyRequest $request
     * @param Destroy $useCase
     * @param int $id
     * @return DestroyResource
     * @apiResource Services\Lp3Sales\App\Http\Resources\ProductScheme\DestroyResource
     * @apiResourceModel Services\Lp3Sales\App\Models\ProductScheme
     */
    public function destroy(DestroyRequest $request, Destroy $useCase, $id): DestroyResource
    {
        return new DestroyResource($useCase($id));
    }
}
