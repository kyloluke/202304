<?php

namespace Services\Lp3Sales\App\Http\Controllers;

use Services\Lp3Sales\App\Http\Requests\Billing\IndexRequest;
use Services\Lp3Sales\App\Http\Requests\Billing\ShowRequest;
use Services\Lp3Sales\App\Http\Requests\Billing\StoreRequest;
use Services\Lp3Sales\App\Http\Requests\Billing\UpdateRequest;
use Services\Lp3Sales\App\Http\Requests\Billing\DestroyRequest;
use Services\Lp3Sales\App\Http\Requests\Billing\ChassisRequest;
use Services\Lp3Sales\App\Http\Requests\Billing\ContJobRequest;
use Services\Lp3Sales\App\Http\Requests\Billing\RoroJobRequest;
use Services\Lp3Sales\App\Http\Requests\Billing\CsvDownloadRequest;
use Services\Lp3Sales\App\Http\Requests\Billing\InvoiceDownloadRequest;
use Services\Lp3Sales\App\Http\Requests\Billing\DepositRequest;
use Services\Lp3Sales\App\Http\Requests\Billing\DepositCancelRequest;

use Services\Lp3Sales\App\Http\Resources\Billing\IndexResourceCollection;
use Services\Lp3Sales\App\Http\Resources\Billing\ShowResource;
use Services\Lp3Sales\App\Http\Resources\Billing\StoreResource;
use Services\Lp3Sales\App\Http\Resources\Billing\UpdateResource;
use Services\Lp3Sales\App\Http\Resources\Billing\DestroyResource;
use Services\Lp3Sales\App\Http\Resources\Billing\ChassisResource;
use Services\Lp3Sales\App\Http\Resources\Billing\ContJobResource;
use Services\Lp3Sales\App\Http\Resources\Billing\RoroJobResource;
use Services\Lp3Sales\App\Http\Resources\Billing\CsvDownloadResource;
use Services\Lp3Sales\App\Http\Resources\Billing\InvoiceDownloadResource;
use Services\Lp3Sales\App\Http\Resources\Billing\DepositResource;
use Services\Lp3Sales\App\Http\Resources\Billing\DepositCancelResource;

use Services\Lp3Sales\App\Http\UseCases\Billing\Index;
use Services\Lp3Sales\App\Http\UseCases\Billing\Show;
use Services\Lp3Sales\App\Http\UseCases\Billing\Store;
use Services\Lp3Sales\App\Http\UseCases\Billing\Update;
use Services\Lp3Sales\App\Http\UseCases\Billing\Destroy;
use Services\Lp3Sales\App\Http\UseCases\Billing\Chassis;
use Services\Lp3Sales\App\Http\UseCases\Billing\ContJob;
use Services\Lp3Sales\App\Http\UseCases\Billing\RoroJob;
use Services\Lp3Sales\App\Http\UseCases\Billing\CsvDownload;
use Services\Lp3Sales\App\Http\UseCases\Billing\InvoiceDownload;
use Services\Lp3Sales\App\Http\UseCases\Billing\Deposit;
use Services\Lp3Sales\App\Http\UseCases\Billing\DepositCancel;

/**
 * 請求コントローラー
 */
class BillingController extends Controller
{
    /**
     * 請求の一覧の取得
     *
     * @param IndexRequest $request
     * @param Index $useCase
     * @return IndexResourceCollection
     * @apiResourceCollection Services\Lp3Sales\App\Http\Resources\Billing\IndexResourceCollection
     * @apiResourceModel Services\Lp3Sales\App\Models\Billing
     */
    public function index(IndexRequest $request, Index $useCase): IndexResourceCollection
    {
        return new IndexResourceCollection($useCase());
    }

    /**
     * 請求の詳細
     *
     * @param ShowRequest $request
     * @param Show $useCase
     * @param int $id
     * @return ShowResource
     * @apiResource Services\Lp3Sales\App\Http\Resources\Billing\ShowResource
     * @apiResourceModel Services\Lp3Sales\App\Models\Billing
     */
    public function show(ShowRequest $request, Show $useCase, $id): ShowResource
    {
        return new ShowResource($useCase($id));
    }

    /**
     * 請求の新規作成
     *
     * @param StoreRequest $request
     * @param Store $useCase
     * @return StoreResource
     * @apiResource Services\Lp3Sales\App\Http\Resources\Billing\StoreResource
     * @apiResourceModel Services\Lp3Sales\App\Models\Billing
     */
    public function store(StoreRequest $request, Store $useCase): StoreResource
    {
        return new StoreResource($useCase());
    }

    /**
     * 請求の更新
     *
     * @param UpdateRequest $request
     * @param Update $useCase
     * @param int $id
     * @return UpdateResource
     * @apiResource Services\Lp3Sales\App\Http\Resources\Billing\UpdateResource
     * @apiResourceModel Services\Lp3Sales\App\Models\Billing
     */
    public function update(UpdateRequest $request, Update $useCase, $id): UpdateResource
    {
        return new UpdateResource($useCase($id));
    }

    /**
     * 請求の削除
     *
     * @param DestroyRequest $request
     * @param Destroy $useCase
     * @param int $id
     * @return DestroyResource
     * @apiResource Services\Lp3Sales\App\Http\Resources\Billing\DestroyResource
     * @apiResourceModel Services\Lp3Sales\App\Models\Billing
     */
    public function destroy(DestroyRequest $request, Destroy $useCase, $id): DestroyResource
    {
        return new DestroyResource($useCase($id));
    }

    /**
     * 車輌からの請求の作成
     *
     * @param ChassisRequest $request
     * @param Chassis $useCase
     * @return ChassisResource
     * @apiResource Services\Lp3Sales\App\Http\Resources\Billing\ChassisResource
     * @apiResourceModel Services\Lp3Sales\App\Models\Billing
     */
    public function chassis(ChassisRequest $request, Chassis $useCase): ChassisResource
    {
        return new ChassisResource($useCase());
    }

    /**
     * コンテナJOBからの請求の作成
     *
     * @param ContJobRequest $request
     * @param ContJob $useCase
     * @return ContJobResource
     * @apiResource Services\Lp3Sales\App\Http\Resources\Billing\ContJobResource
     * @apiResourceModel Services\Lp3Sales\App\Models\Billing
     */
    public function contJob(ContJobRequest $request, ContJob $useCase): ContJobResource
    {
        return new ContJobResource($useCase());
    }

    /**
     * ROROJOBからの請求の作成
     *
     * @param RoroJobRequest $request
     * @param RoroJob $useCase
     * @return RoroJobResource
     * @apiResource Services\Lp3Sales\App\Http\Resources\Billing\RoroJobResource
     * @apiResourceModel Services\Lp3Sales\App\Models\Billing
     */
    public function roroJob(RoroJobRequest $request, RoroJob $useCase): RoroJobResource
    {
        return new RoroJobResource($useCase());
    }

    /**
     * 複数請求のCSVのダウンロード
     *
     * @param CsvDownloadRequest $request
     * @param CsvDownload $useCase
     * @return CsvDownloadResource
     * @apiResource Services\Lp3Sales\App\Http\Resources\Billing\CsvDownloadResource
     * @apiResourceModel Services\Lp3Sales\App\Models\Billing
     */
    public function csvDownload(CsvDownloadRequest $request, CsvDownload $useCase): CsvDownloadResource
    {
        return new CsvDownloadResource($useCase());
    }

    /**
     * 複数請求の請求書のダウンロード
     *
     * @param InvoiceDownloadRequest $request
     * @param InvoiceDownload $useCase
     * @return InvoiceDownloadResource
     * @apiResource Services\Lp3Sales\App\Http\Resources\Billing\InvoiceDownloadResource
     * @apiResourceModel Services\Lp3Sales\App\Models\Billing
     */
    public function invoiceDownload(InvoiceDownloadRequest $request, InvoiceDownload $useCase): InvoiceDownloadResource
    {
        return new InvoiceDownloadResource($useCase());
    }

    /**
     * 複数請求の入金登録
     *
     * @param DepositRequest $request
     * @param Deposit $useCase
     * @return DepositResource
     * @apiResource Services\Lp3Sales\App\Http\Resources\Billing\DepositResource
     * @apiResourceModel Services\Lp3Sales\App\Models\Billing
     */
    public function deposit(DepositRequest $request, Deposit $useCase): DepositResource
    {
        return new DepositResource($useCase());
    }

    /**
     * 複数請求の入金登録のキャンセル
     *
     * @param DepositCancelRequest $request
     * @param DepositCancel $useCase
     * @return DepositCancelResource
     * @apiResource Services\Lp3Sales\App\Http\Resources\Billing\DepositCancelResource
     * @apiResourceModel Services\Lp3Sales\App\Models\Billing
     */
    public function depositCancel(DepositCancelRequest $request, DepositCancel $useCase): DepositCancelResource
    {
        return new DepositCancelResource($useCase());
    }
}
