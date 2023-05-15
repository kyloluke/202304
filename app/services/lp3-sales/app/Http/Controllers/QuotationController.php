<?php

namespace Services\Lp3Sales\App\Http\Controllers;

use Services\Lp3Sales\App\Http\Requests\Quotation\IndexRequest;
use Services\Lp3Sales\App\Http\Requests\Quotation\ShowRequest;
use Services\Lp3Sales\App\Http\Requests\Quotation\StoreRequest;
use Services\Lp3Sales\App\Http\Requests\Quotation\UpdateRequest;
use Services\Lp3Sales\App\Http\Requests\Quotation\DestroyRequest;
use Services\Lp3Sales\App\Http\Requests\Quotation\ItemIndexRequest;
use Services\Lp3Sales\App\Http\Requests\Quotation\ItemShowRequest;

use Services\Lp3Sales\App\Http\Resources\Quotation\IndexResourceCollection;
use Services\Lp3Sales\App\Http\Resources\Quotation\ShowResource;
use Services\Lp3Sales\App\Http\Resources\Quotation\StoreResource;
use Services\Lp3Sales\App\Http\Resources\Quotation\UpdateResource;
use Services\Lp3Sales\App\Http\Resources\Quotation\DestroyResource;
use Services\Lp3Sales\App\Http\Resources\Quotation\ItemIndexResourceCollection;
use Services\Lp3Sales\App\Http\Resources\Quotation\ItemShowResource;

use Services\Lp3Sales\App\Http\UseCases\Quotation\Index;
use Services\Lp3Sales\App\Http\UseCases\Quotation\Show;
use Services\Lp3Sales\App\Http\UseCases\Quotation\Store;
use Services\Lp3Sales\App\Http\UseCases\Quotation\Update;
use Services\Lp3Sales\App\Http\UseCases\Quotation\Destroy;
use Services\Lp3Sales\App\Http\UseCases\Quotation\ItemIndex;
use Services\Lp3Sales\App\Http\UseCases\Quotation\ItemShow;

/**
 * 見積コントローラー
 */
class QuotationController extends Controller
{
    /**
     * 見積の一覧の取得
     *
     * @param IndexRequest $request
     * @param Index $useCase
     * @return IndexResourceCollection
     * @apiResourceCollection Services\Lp3Sales\App\Http\Resources\Quotation\IndexResourceCollection
     * @apiResourceModel Services\Lp3Sales\App\Models\Quotation
     */
    public function index(IndexRequest $request, Index $useCase): IndexResourceCollection
    {
        return new IndexResourceCollection($useCase());
    }

    /**
     * 見積の詳細
     *
     * @param ShowRequest $request
     * @param Show $useCase
     * @param int $id
     * @return ShowResource
     * @apiResource Services\Lp3Sales\App\Http\Resources\Quotation\ShowResource
     * @apiResourceModel Services\Lp3Sales\App\Models\Quotation
     */
    public function show(ShowRequest $request, Show $useCase, $id): ShowResource
    {
        return new ShowResource($useCase($id));
    }

    /**
     * 見積の新規作成
     *
     * @param StoreRequest $request
     * @param Store $useCase
     * @return StoreResource
     * @apiResource Services\Lp3Sales\App\Http\Resources\Quotation\StoreResource
     * @apiResourceModel Services\Lp3Sales\App\Models\Quotation
     */
    public function store(StoreRequest $request, Store $useCase): StoreResource
    {
        return new StoreResource($useCase());
    }

    /**
     * 見積の更新
     *
     * @param UpdateRequest $request
     * @param Update $useCase
     * @param int $id
     * @return UpdateResource
     * @apiResource Services\Lp3Sales\App\Http\Resources\Quotation\UpdateResource
     * @apiResourceModel Services\Lp3Sales\App\Models\Quotation
     */
    public function update(UpdateRequest $request, Update $useCase, $id): UpdateResource
    {
        return new UpdateResource($useCase($id));
    }

    /**
     * 見積の削除
     *
     * @param DestroyRequest $request
     * @param Destroy $useCase
     * @param int $id
     * @return DestroyResource
     * @apiResource Services\Lp3Sales\App\Http\Resources\Quotation\DestroyResource
     * @apiResourceModel Services\Lp3Sales\App\Models\Quotation
     */
    public function destroy(DestroyRequest $request, Destroy $useCase, $id): DestroyResource
    {
        return new DestroyResource($useCase($id));
    }

    /**
     * 見積明細の一覧の取得
     *
     * @param ItemIndexRequest $request
     * @param ItemIndex $useCase
     * @return ItemIndexResourceCollection
     * @apiResourceCollection Services\Lp3Sales\App\Http\Resources\Quotation\ItemIndexResourceCollection
     * @apiResourceModel Services\Lp3Sales\App\Models\Quotation
     */
    public function itemIndex(ItemIndexRequest $request, ItemIndex $useCase): ItemIndexResourceCollection
    {
        return new ItemIndexResourceCollection($useCase());
    }

    /**
     * 見積明細の詳細
     *
     * @param ItemShowRequest $request
     * @param ItemShow $useCase
     * @param int $id
     * @return ItemShowResource
     * @apiResource Services\Lp3Sales\App\Http\Resources\Quotation\ItemShowResource
     * @apiResourceModel Services\Lp3Sales\App\Models\Quotation
     */
    public function itemShow(ItemShowRequest $request, ItemShow $useCase, $id): ItemShowResource
    {
        return new ItemShowResource($useCase($id));
    }
}
