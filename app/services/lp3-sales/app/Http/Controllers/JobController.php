<?php

namespace Services\Lp3Sales\App\Http\Controllers;

use Services\Lp3Sales\App\Http\Requests\Job\BillingItemIndexRequest;
use Services\Lp3Sales\App\Http\Requests\Job\BulkBillingItemIndexRequest;
use Services\Lp3Sales\App\Http\Requests\Job\BillingItemUpdateRequest;
use Services\Lp3Sales\App\Http\Requests\Job\BulkBillingItemUpdateRequest;

use Services\Lp3Sales\App\Http\Resources\Job\BillingItemIndexResourceCollection;
use Services\Lp3Sales\App\Http\Resources\Job\BulkBillingItemIndexResourceCollection;
use Services\Lp3Sales\App\Http\Resources\Job\BillingItemUpdateResource;
use Services\Lp3Sales\App\Http\Resources\Job\BulkBillingItemUpdateResource;

use Services\Lp3Sales\App\Http\UseCases\Job\BillingItemIndex;
use Services\Lp3Sales\App\Http\UseCases\Job\BulkBillingItemIndex;
use Services\Lp3Sales\App\Http\UseCases\Job\BillingItemUpdate;
use Services\Lp3Sales\App\Http\UseCases\Job\BulkBillingItemUpdate;

/**
 * JOBのFREIGHT請求明細コントローラー
 */
class JobController extends Controller
{
    /**
     * JOBのFREIGHT請求明細の一覧の取得
     *
     * @param BillingItemIndexRequest $request
     * @param BillingItemIndex $useCase
     * @param int $id
     * @return BillingItemIndexResourceCollection
     * @apiResourceCollection Services\Lp3Sales\App\Http\Resources\Job\BillingItemIndexResourceCollection
     * @apiResourceModel Services\Lp3Sales\App\Models\Billing
     */
    public function billingItemIndex(BillingItemIndexRequest $request, BillingItemIndex $useCase, $id): BillingItemIndexResourceCollection
    {
        return new BillingItemIndexResourceCollection($useCase());
    }

    /**
     * 複数JOBのFREIGHT請求明細の一覧の取得
     *
     * @param BulkBillingItemIndexRequest $request
     * @param BulkBillingItemIndex $useCase
     * @return BulkBillingItemIndexResourceCollection
     * @apiResourceCollection Services\Lp3Sales\App\Http\Resources\Job\BulkBillingItemIndexResourceCollection
     * @apiResourceModel Services\Lp3Sales\App\Models\Billing
     */
    public function bulkBillingItemIndex(BulkBillingItemIndexRequest $request, BulkBillingItemIndex $useCase): BulkBillingItemIndexResourceCollection
    {
        return new BulkBillingItemIndexResourceCollection($useCase());
    }

    /**
     * JOBのFREIGHT請求明細の一括更新
     *
     * @param BillingItemUpdateRequest $request
     * @param BillingItemUpdate $useCase
     * @param int $id
     * @return BillingItemUpdateResource
     * @apiResource Services\Lp3Sales\App\Http\Resources\Job\BillingItemUpdateResource
     * @apiResourceModel Services\Lp3Sales\App\Models\Billing
     */
    public function billingItemUpdate(BillingItemUpdateRequest $request, BillingItemUpdate $useCase, $id): BillingItemUpdateResource
    {
        return new BillingItemUpdateResource($useCase($id));
    }

    /**
     * 複数JOBのFREIGHT請求明細の一括更新
     *
     * @param BulkBillingItemUpdateRequest $request
     * @param BulkBillingItemUpdate $useCase
     * @return BulkBillingItemUpdateResource
     * @apiResource Services\Lp3Sales\App\Http\Resources\Job\BulkBillingItemUpdateResource
     * @apiResourceModel Services\Lp3Sales\App\Models\Billing
     */
    public function bulkBillingItemUpdate(BulkBillingItemUpdateRequest $request, BulkBillingItemUpdate $useCase): BulkBillingItemUpdateResource
    {
        return new BulkBillingItemUpdateResource($useCase());
    }
}
