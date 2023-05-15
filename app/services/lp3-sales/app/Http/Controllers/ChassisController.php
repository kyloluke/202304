<?php

namespace Services\Lp3Sales\App\Http\Controllers;

use Services\Lp3Sales\App\Http\Requests\Chassis\BillingItemIndexRequest;
use Services\Lp3Sales\App\Http\Requests\Chassis\BulkBillingItemIndexRequest;
use Services\Lp3Sales\App\Http\Requests\Chassis\BillingItemUpdateRequest;
use Services\Lp3Sales\App\Http\Requests\Chassis\BulkBillingItemUpdateRequest;

use Services\Lp3Sales\App\Http\Resources\Chassis\BillingItemIndexResourceCollection;
use Services\Lp3Sales\App\Http\Resources\Chassis\BulkBillingItemIndexResourceCollection;
use Services\Lp3Sales\App\Http\Resources\Chassis\BillingItemUpdateResource;
use Services\Lp3Sales\App\Http\Resources\Chassis\BulkBillingItemUpdateResource;

use Services\Lp3Sales\App\Http\UseCases\Chassis\BillingItemIndex;
use Services\Lp3Sales\App\Http\UseCases\Chassis\BulkBillingItemIndex;
use Services\Lp3Sales\App\Http\UseCases\Chassis\BillingItemUpdate;
use Services\Lp3Sales\App\Http\UseCases\Chassis\BulkBillingItemUpdate;

/**
 * 車輌のその他請求明細コントローラー
 */
class ChassisController extends Controller
{
    /**
     * 車輌のその他請求明細の一覧の取得
     *
     * @param BillingItemIndexRequest $request
     * @param BillingItemIndex $useCase
     * @param int $id
     * @return BillingItemIndexResourceCollection
     * @apiResourceCollection Services\Lp3Sales\App\Http\Resources\Chassis\BillingItemIndexResourceCollection
     * @apiResourceModel Services\Lp3Sales\App\Models\Billing
     */
    public function billingItemIndex(BillingItemIndexRequest $request, BillingItemIndex $useCase, $id): BillingItemIndexResourceCollection
    {
        return new BillingItemIndexResourceCollection($useCase());
    }

    /**
     * 複数車輌のその他請求明細の一覧の取得
     *
     * @param BulkBillingItemIndexRequest $request
     * @param BulkBillingItemIndex $useCase
     * @return BulkBillingItemIndexResourceCollection
     * @apiResourceCollection Services\Lp3Sales\App\Http\Resources\Chassis\BulkBillingItemIndexResourceCollection
     * @apiResourceModel Services\Lp3Sales\App\Models\Billing
     */
    public function bulkBillingItemIndex(BulkBillingItemIndexRequest $request, BulkBillingItemIndex $useCase): BulkBillingItemIndexResourceCollection
    {
        return new BulkBillingItemIndexResourceCollection($useCase());
    }

    /**
     * 車輌のその他請求明細の一括更新
     *
     * @param BillingItemUpdateRequest $request
     * @param BillingItemUpdate $useCase
     * @param int $id
     * @return BillingItemUpdateResource
     * @apiResource Services\Lp3Sales\App\Http\Resources\Chassis\BillingItemUpdateResource
     * @apiResourceModel Services\Lp3Sales\App\Models\Billing
     */
    public function billingItemUpdate(BillingItemUpdateRequest $request, BillingItemUpdate $useCase, $id): BillingItemUpdateResource
    {
        return new BillingItemUpdateResource($useCase($id));
    }

    /**
     * 複数車輌のその他請求明細の一括更新
     *
     * @param BulkBillingItemUpdateRequest $request
     * @param BulkBillingItemUpdate $useCase
     * @return BulkBillingItemUpdateResource
     * @apiResource Services\Lp3Sales\App\Http\Resources\Chassis\BulkBillingItemUpdateResource
     * @apiResourceModel Services\Lp3Sales\App\Models\Billing
     */
    public function bulkBillingItemUpdate(BulkBillingItemUpdateRequest $request, BulkBillingItemUpdate $useCase): BulkBillingItemUpdateResource
    {
        return new BulkBillingItemUpdateResource($useCase());
    }
}
