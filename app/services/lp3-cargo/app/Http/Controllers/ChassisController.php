<?php

namespace Services\Lp3Cargo\App\Http\Controllers;

use Services\Lp3Cargo\App\Http\Requests\Chassis\IndexRequest;
use Services\Lp3Cargo\App\Http\Requests\Chassis\ShowRequest;
use Services\Lp3Cargo\App\Http\Requests\Chassis\StoreRequest;
use Services\Lp3Cargo\App\Http\Requests\Chassis\UpdateRequest;
use Services\Lp3Cargo\App\Http\Requests\Chassis\DestroyRequest;
use Services\Lp3Cargo\App\Http\Requests\Chassis\RestoreRequest;
use Services\Lp3Cargo\App\Http\Requests\Chassis\UpdateHistoryRequest;
use Services\Lp3Cargo\App\Http\Requests\Chassis\BulkDestroyRequest;
use Services\Lp3Cargo\App\Http\Requests\Chassis\BulkCsvDownloadRequest;
use Services\Lp3Cargo\App\Http\Requests\Chassis\CsvCreateImportRequest;
use Services\Lp3Cargo\App\Http\Requests\Chassis\CsvDimensionExportRequest;
use Services\Lp3Cargo\App\Http\Requests\Chassis\CsvDimensionImportRequest;
use Services\Lp3Cargo\App\Http\Requests\Chassis\CarryActivityIndexRequest;
use Services\Lp3Cargo\App\Http\Requests\Chassis\CarryActivityShowRequest;
use Services\Lp3Cargo\App\Http\Requests\Chassis\CarryActivityStoreRequest;
use Services\Lp3Cargo\App\Http\Requests\Chassis\CarryActivityUpdateRequest;
use Services\Lp3Cargo\App\Http\Requests\Chassis\CarryActivityDestroyRequest;
use Services\Lp3Cargo\App\Http\Requests\Chassis\CarryOutRequestIndexRequest;
use Services\Lp3Cargo\App\Http\Requests\Chassis\CarryOutRequestStoreRequest;
use Services\Lp3Cargo\App\Http\Requests\Chassis\BulkCarryOutRequestStoreRequest;
use Services\Lp3Cargo\App\Http\Requests\Chassis\CarryOutRequestUpdateRequest;
use Services\Lp3Cargo\App\Http\Requests\Chassis\CarryOutRequestCancelRequest;
use Services\Lp3Cargo\App\Http\Requests\Chassis\BulkCarryOutRequestCancelRequest;
use Services\Lp3Cargo\App\Http\Requests\Chassis\CarryInRequest;
use Services\Lp3Cargo\App\Http\Requests\Chassis\BulkCarryInRequest;
use Services\Lp3Cargo\App\Http\Requests\Chassis\CarryOutRequest;
use Services\Lp3Cargo\App\Http\Requests\Chassis\BulkCarryOutRequest;
use Services\Lp3Cargo\App\Http\Requests\Chassis\PhotoIndexRequest;
use Services\Lp3Cargo\App\Http\Requests\Chassis\PhotoBulkStoreRequest;
use Services\Lp3Cargo\App\Http\Requests\Chassis\PhotoUpdateRequest;
use Services\Lp3Cargo\App\Http\Requests\Chassis\PhotoBulkUpdateRequest;
use Services\Lp3Cargo\App\Http\Requests\Chassis\PhotoBulkDestroyRequest;
use Services\Lp3Cargo\App\Http\Requests\Chassis\PhotoBulkDownloadRequest;
use Services\Lp3Cargo\App\Http\Requests\Chassis\BulkPhotoBulkDownloadRequest;
use Services\Lp3Cargo\App\Http\Requests\Chassis\InspectionHistoryIndexRequest;
use Services\Lp3Cargo\App\Http\Requests\Chassis\InspectionHistoryShowRequest;
use Services\Lp3Cargo\App\Http\Requests\Chassis\InspectionHistoryStoreRequest;
use Services\Lp3Cargo\App\Http\Requests\Chassis\InspectionHistoryUpdateRequest;
use Services\Lp3Cargo\App\Http\Requests\Chassis\InspectionHistoryDestroyRequest;
use Services\Lp3Cargo\App\Http\Requests\Chassis\DocumentIndexRequest;
use Services\Lp3Cargo\App\Http\Requests\Chassis\DocumentShowRequest;
use Services\Lp3Cargo\App\Http\Requests\Chassis\DocumentStoreRequest;
use Services\Lp3Cargo\App\Http\Requests\Chassis\DocumentBulkStoreRequest;
use Services\Lp3Cargo\App\Http\Requests\Chassis\DocumentUpdateRequest;
use Services\Lp3Cargo\App\Http\Requests\Chassis\DocumentBulkUpdateRequest;
use Services\Lp3Cargo\App\Http\Requests\Chassis\DocumentDestroyRequest;
use Services\Lp3Cargo\App\Http\Requests\Chassis\DocumentBulkDestroyRequest;
use Services\Lp3Cargo\App\Http\Requests\Chassis\DocumentBulkDownloadRequest;
use Services\Lp3Cargo\App\Http\Requests\Chassis\BulkDocumentBulkDownloadRequest;
use Services\Lp3Cargo\App\Http\Requests\Chassis\NotifyRequest;
use Services\Lp3Cargo\App\Http\Requests\Chassis\SharedLinkRequest;
use Services\Lp3Cargo\App\Http\Requests\Chassis\ShareShowRequest;

use Services\Lp3Cargo\App\Http\Resources\Chassis\IndexResourceCollection;
use Services\Lp3Cargo\App\Http\Resources\Chassis\ShowResource;
use Services\Lp3Cargo\App\Http\Resources\Chassis\StoreResource;
use Services\Lp3Cargo\App\Http\Resources\Chassis\UpdateResource;
use Services\Lp3Cargo\App\Http\Resources\Chassis\DestroyResource;
use Services\Lp3Cargo\App\Http\Resources\Chassis\RestoreResource;
use Services\Lp3Cargo\App\Http\Resources\Chassis\UpdateHistoryResourceCollection;
use Services\Lp3Cargo\App\Http\Resources\Chassis\BulkDestroyResource;
use Services\Lp3Cargo\App\Http\Resources\Chassis\BulkCsvDownloadResource;
use Services\Lp3Cargo\App\Http\Resources\Chassis\CsvCreateImportResource;
use Services\Lp3Cargo\App\Http\Resources\Chassis\CsvDimensionExportResource;
use Services\Lp3Cargo\App\Http\Resources\Chassis\CsvDimensionImportResource;
use Services\Lp3Cargo\App\Http\Resources\Chassis\CarryActivityIndexResourceCollection;
use Services\Lp3Cargo\App\Http\Resources\Chassis\CarryActivityShowResource;
use Services\Lp3Cargo\App\Http\Resources\Chassis\CarryActivityStoreResource;
use Services\Lp3Cargo\App\Http\Resources\Chassis\CarryActivityUpdateResource;
use Services\Lp3Cargo\App\Http\Resources\Chassis\CarryActivityDestroyResource;
use Services\Lp3Cargo\App\Http\Resources\Chassis\CarryOutRequestIndexResourceCollection;
use Services\Lp3Cargo\App\Http\Resources\Chassis\CarryOutRequestStoreResource;
use Services\Lp3Cargo\App\Http\Resources\Chassis\BulkCarryOutRequestStoreResource;
use Services\Lp3Cargo\App\Http\Resources\Chassis\CarryOutRequestUpdateResource;
use Services\Lp3Cargo\App\Http\Resources\Chassis\CarryOutRequestCancelResource;
use Services\Lp3Cargo\App\Http\Resources\Chassis\BulkCarryOutRequestCancelResource;
use Services\Lp3Cargo\App\Http\Resources\Chassis\CarryInResource;
use Services\Lp3Cargo\App\Http\Resources\Chassis\BulkCarryInResource;
use Services\Lp3Cargo\App\Http\Resources\Chassis\CarryOutResource;
use Services\Lp3Cargo\App\Http\Resources\Chassis\BulkCarryOutResource;
use Services\Lp3Cargo\App\Http\Resources\Chassis\PhotoIndexResourceCollection;
use Services\Lp3Cargo\App\Http\Resources\Chassis\PhotoBulkStoreResource;
use Services\Lp3Cargo\App\Http\Resources\Chassis\PhotoUpdateResource;
use Services\Lp3Cargo\App\Http\Resources\Chassis\PhotoBulkUpdateResource;
use Services\Lp3Cargo\App\Http\Resources\Chassis\PhotoBulkDestroyResource;
use Services\Lp3Cargo\App\Http\Resources\Chassis\PhotoBulkDownloadResource;
use Services\Lp3Cargo\App\Http\Resources\Chassis\BulkPhotoBulkDownloadResource;
use Services\Lp3Cargo\App\Http\Resources\Chassis\InspectionHistoryIndexResourceCollection;
use Services\Lp3Cargo\App\Http\Resources\Chassis\InspectionHistoryShowResource;
use Services\Lp3Cargo\App\Http\Resources\Chassis\InspectionHistoryStoreResource;
use Services\Lp3Cargo\App\Http\Resources\Chassis\InspectionHistoryUpdateResource;
use Services\Lp3Cargo\App\Http\Resources\Chassis\InspectionHistoryDestroyResource;
use Services\Lp3Cargo\App\Http\Resources\Chassis\DocumentIndexResourceCollection;
use Services\Lp3Cargo\App\Http\Resources\Chassis\DocumentShowResource;
use Services\Lp3Cargo\App\Http\Resources\Chassis\DocumentStoreResource;
use Services\Lp3Cargo\App\Http\Resources\Chassis\DocumentBulkStoreResource;
use Services\Lp3Cargo\App\Http\Resources\Chassis\DocumentUpdateResource;
use Services\Lp3Cargo\App\Http\Resources\Chassis\DocumentBulkUpdateResource;
use Services\Lp3Cargo\App\Http\Resources\Chassis\DocumentDestroyResource;
use Services\Lp3Cargo\App\Http\Resources\Chassis\DocumentBulkDestroyResource;
use Services\Lp3Cargo\App\Http\Resources\Chassis\DocumentBulkDownloadResource;
use Services\Lp3Cargo\App\Http\Resources\Chassis\BulkDocumentBulkDownloadResource;
use Services\Lp3Cargo\App\Http\Resources\Chassis\NotifyResource;
use Services\Lp3Cargo\App\Http\Resources\Chassis\SharedLinkResource;
use Services\Lp3Cargo\App\Http\Resources\Chassis\ShareShowResource;

use Services\Lp3Cargo\App\Http\UseCases\Chassis\Index;
use Services\Lp3Cargo\App\Http\UseCases\Chassis\Show;
use Services\Lp3Cargo\App\Http\UseCases\Chassis\Store;
use Services\Lp3Cargo\App\Http\UseCases\Chassis\Update;
use Services\Lp3Cargo\App\Http\UseCases\Chassis\Destroy;
use Services\Lp3Cargo\App\Http\UseCases\Chassis\Restore;
use Services\Lp3Cargo\App\Http\UseCases\Chassis\UpdateHistory;
use Services\Lp3Cargo\App\Http\UseCases\Chassis\BulkDestroy;
use Services\Lp3Cargo\App\Http\UseCases\Chassis\BulkCsvDownload;
use Services\Lp3Cargo\App\Http\UseCases\Chassis\CsvCreateImport;
use Services\Lp3Cargo\App\Http\UseCases\Chassis\CsvDimensionExport;
use Services\Lp3Cargo\App\Http\UseCases\Chassis\CsvDimensionImport;
use Services\Lp3Cargo\App\Http\UseCases\Chassis\CarryActivityIndex;
use Services\Lp3Cargo\App\Http\UseCases\Chassis\CarryActivityShow;
use Services\Lp3Cargo\App\Http\UseCases\Chassis\CarryActivityStore;
use Services\Lp3Cargo\App\Http\UseCases\Chassis\CarryActivityUpdate;
use Services\Lp3Cargo\App\Http\UseCases\Chassis\CarryActivityDestroy;
use Services\Lp3Cargo\App\Http\UseCases\Chassis\CarryOutRequestIndex;
use Services\Lp3Cargo\App\Http\UseCases\Chassis\CarryOutRequestStore;
use Services\Lp3Cargo\App\Http\UseCases\Chassis\BulkCarryOutRequestStore;
use Services\Lp3Cargo\App\Http\UseCases\Chassis\CarryOutRequestUpdate;
use Services\Lp3Cargo\App\Http\UseCases\Chassis\CarryOutRequestCancel;
use Services\Lp3Cargo\App\Http\UseCases\Chassis\BulkCarryOutRequestCancel;
use Services\Lp3Cargo\App\Http\UseCases\Chassis\CarryIn;
use Services\Lp3Cargo\App\Http\UseCases\Chassis\BulkCarryIn;
use Services\Lp3Cargo\App\Http\UseCases\Chassis\CarryOut;
use Services\Lp3Cargo\App\Http\UseCases\Chassis\BulkCarryOut;
use Services\Lp3Cargo\App\Http\UseCases\Chassis\PhotoIndex;
use Services\Lp3Cargo\App\Http\UseCases\Chassis\PhotoBulkStore;
use Services\Lp3Cargo\App\Http\UseCases\Chassis\PhotoUpdate;
use Services\Lp3Cargo\App\Http\UseCases\Chassis\PhotoBulkUpdate;
use Services\Lp3Cargo\App\Http\UseCases\Chassis\PhotoBulkDestroy;
use Services\Lp3Cargo\App\Http\UseCases\Chassis\PhotoBulkDownload;
use Services\Lp3Cargo\App\Http\UseCases\Chassis\BulkPhotoBulkDownload;
use Services\Lp3Cargo\App\Http\UseCases\Chassis\InspectionHistoryIndex;
use Services\Lp3Cargo\App\Http\UseCases\Chassis\InspectionHistoryShow;
use Services\Lp3Cargo\App\Http\UseCases\Chassis\InspectionHistoryStore;
use Services\Lp3Cargo\App\Http\UseCases\Chassis\InspectionHistoryUpdate;
use Services\Lp3Cargo\App\Http\UseCases\Chassis\InspectionHistoryDestroy;
use Services\Lp3Cargo\App\Http\UseCases\Chassis\DocumentIndex;
use Services\Lp3Cargo\App\Http\UseCases\Chassis\DocumentShow;
use Services\Lp3Cargo\App\Http\UseCases\Chassis\DocumentStore;
use Services\Lp3Cargo\App\Http\UseCases\Chassis\DocumentBulkStore;
use Services\Lp3Cargo\App\Http\UseCases\Chassis\DocumentUpdate;
use Services\Lp3Cargo\App\Http\UseCases\Chassis\DocumentBulkUpdate;
use Services\Lp3Cargo\App\Http\UseCases\Chassis\DocumentDestroy;
use Services\Lp3Cargo\App\Http\UseCases\Chassis\DocumentBulkDestroy;
use Services\Lp3Cargo\App\Http\UseCases\Chassis\DocumentBulkDownload;
use Services\Lp3Cargo\App\Http\UseCases\Chassis\BulkDocumentBulkDownload;
use Services\Lp3Cargo\App\Http\UseCases\Chassis\Notify;
use Services\Lp3Cargo\App\Http\UseCases\Chassis\SharedLink;
use Services\Lp3Cargo\App\Http\UseCases\Chassis\ShareShow;

/**
 * 車輌コントローラー
 */
class ChassisController extends Controller
{
    /**
     * 車輌一覧の取得
     *
     * @param IndexRequest $request
     * @param Index $useCase
     * @return IndexResourceCollection
     * @apiResourceCollection Services\Lp3Cargo\App\Http\Resources\Chassis\IndexResourceCollection
     * @apiResourceModel Services\Lp3Cargo\App\Models\Chassis
     */
    public function index(IndexRequest $request, Index $useCase): IndexResourceCollection
    {
        return new IndexResourceCollection($useCase($request->all()));
    }

    /**
     * 車輌の表示
     *
     * @param ShowRequest $request
     * @param Show $useCase
     * @param int $id
     * @return ShowResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\Chassis\ShowResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\Chassis
     */
    public function show(ShowRequest $request, Show $useCase, $id): ShowResource
    {
        return new ShowResource($useCase($id));
    }

    /**
     * 車輌の登録
     *
     * @param StoreRequest $request
     * @param Store $useCase
     * @return StoreResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\Chassis\StoreResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\Chassis
     */
    public function store(StoreRequest $request, Store $useCase): StoreResource
    {
        return new StoreResource($useCase($request->all()));
    }

    /**
     * 車輌の更新
     *
     * @param UpdateRequest $request
     * @param Update $useCase
     * @param int $id
     * @return UpdateResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\Chassis\UpdateResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\Chassis
     */
    public function update(UpdateRequest $request, Update $useCase, $id): UpdateResource
    {
        return new UpdateResource($useCase($id, $request->all()));
    }

    /**
     * 車輌の削除
     *
     * @param DestroyRequest $request
     * @param Destroy $useCase
     * @param int $id
     * @return DestroyResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\Chassis\DestroyResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\Chassis
     */
    public function destroy(DestroyRequest $request, Destroy $useCase, $id): DestroyResource
    {
        return new DestroyResource($useCase($id));
    }

    /**
     * 車輌の復元
     *
     * @param RestoreRequest $request
     * @param Restore $useCase
     * @param int $id
     * @return RestoreResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\Chassis\RestoreResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\Chassis
     */
    public function restore(RestoreRequest $request, Restore $useCase, $id): RestoreResource
    {
        return new RestoreResource($useCase());
    }

    /**
     * 車輌の変更履歴の一覧の取得
     *
     * @param UpdateHistoryRequest $request
     * @param UpdateHistory $useCase
     * @param int $id
     * @return UpdateHistoryResourceCollection
     * @apiResourceCollection Services\Lp3Cargo\App\Http\Resources\Chassis\UpdateHistoryResourceCollection
     * @apiResourceModel Services\Lp3Cargo\App\Models\Chassis
     */
    public function updateHistory(UpdateHistoryRequest $request, UpdateHistory $useCase, $id): UpdateHistoryResourceCollection
    {
        return new UpdateHistoryResourceCollection($useCase());
    }

    /**
     * 複数車輌の削除
     *
     * @param BulkDestroyRequest $request
     * @param BulkDestroy $useCase
     * @return BulkDestroyResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\Chassis\BulkDestroyResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\Chassis
     */
    public function bulkDestroy(BulkDestroyRequest $request, BulkDestroy $useCase): BulkDestroyResource
    {
        return new BulkDestroyResource($useCase());
    }

    /**
     * 複数車輌のCSVダウンロード
     *
     * @param BulkCsvDownloadRequest $request
     * @param BulkCsvDownload $useCase
     * @return BulkCsvDownloadResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\Chassis\BulkCsvDownloadResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\Chassis
     */
    public function bulkBulkCsvDownload(BulkCsvDownloadRequest $request, BulkCsvDownload $useCase): BulkCsvDownloadResource
    {
        return new BulkCsvDownloadResource($useCase());
    }

    /**
     * 複数車輌の作成用CSVのインポート
     *
     * @param CsvCreateImportRequest $request
     * @param CsvCreateImport $useCase
     * @return CsvCreateImportResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\Chassis\CsvCreateImportResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\Chassis
     */
    public function csvCreateImport(CsvCreateImportRequest $request, CsvCreateImport $useCase): CsvCreateImportResource
    {
        return new CsvCreateImportResource($useCase());
    }

    /**
     * 複数車輌の寸法用CSVのエクスポート
     *
     * @param CsvDimensionExportRequest $request
     * @param CsvDimensionExport $useCase
     * @return CsvDimensionExportResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\Chassis\CsvDimensionExportResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\Chassis
     */
    public function csvDimensionExport(CsvDimensionExportRequest $request, CsvDimensionExport $useCase): CsvDimensionExportResource
    {
        return new CsvDimensionExportResource($useCase());
    }

    /**
     * 複数車輌の寸法用CSVのインポート
     *
     * @param CsvDimensionImportRequest $request
     * @param CsvDimensionImport $useCase
     * @return CsvDimensionImportResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\Chassis\CsvDimensionImportResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\Chassis
     */
    public function csvDimensionImport(CsvDimensionImportRequest $request, CsvDimensionImport $useCase): CsvDimensionImportResource
    {
        return new CsvDimensionImportResource($useCase());
    }

    /**
     * 車輌のヤード搬入履歴の一覧の取得
     *
     * @param CarryActivityIndexRequest $request
     * @param CarryActivityIndex $useCase
     * @param int $id
     * @return CarryActivityIndexResourceCollection
     * @apiResourceCollection Services\Lp3Cargo\App\Http\Resources\Chassis\CarryActivityIndexResourceCollection
     * @apiResourceModel Services\Lp3Cargo\App\Models\Chassis
     */
    public function carryActivityIndex(CarryActivityIndexRequest $request, CarryActivityIndex $useCase, $id): CarryActivityIndexResourceCollection
    {
        return new CarryActivityIndexResourceCollection($useCase());
    }

    /**
     * 車輌のヤード搬入履歴の詳細の取得
     *
     * @param CarryActivityShowRequest $request
     * @param CarryActivityShow $useCase
     * @param int $id
     * @return CarryActivityShowResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\Chassis\CarryActivityShowResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\Chassis
     */
    public function carryActivityShow(CarryActivityShowRequest $request, CarryActivityShow $useCase, $id): CarryActivityShowResource
    {
        return new CarryActivityShowResource($useCase($id));
    }

    /**
     * 車輌のヤード搬入履歴の作成
     *
     * @param CarryActivityStoreRequest $request
     * @param CarryActivityStore $useCase
     * @param int $id
     * @return CarryActivityStoreResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\Chassis\CarryActivityStoreResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\Chassis
     */
    public function carryActivityStore(CarryActivityStoreRequest $request, CarryActivityStore $useCase, $id): CarryActivityStoreResource
    {
        return new CarryActivityStoreResource($useCase());
    }

    /**
     * 車輌のヤード搬入履歴の更新
     *
     * @param CarryActivityUpdateRequest $request
     * @param CarryActivityUpdate $useCase
     * @param int $id
     * @return CarryActivityUpdateResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\Chassis\CarryActivityUpdateResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\Chassis
     */
    public function carryActivityUpdate(CarryActivityUpdateRequest $request, CarryActivityUpdate $useCase, $id): CarryActivityUpdateResource
    {
        return new CarryActivityUpdateResource($useCase($id,));
    }

    /**
     * 車輌のヤード搬入履歴の削除
     *
     * @param CarryActivityDestroyRequest $request
     * @param CarryActivityDestroy $useCase
     * @param int $id
     * @return CarryActivityDestroyResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\Chassis\CarryActivityDestroyResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\Chassis
     */
    public function carryActivityDestroy(CarryActivityDestroyRequest $request, CarryActivityDestroy $useCase, $id): CarryActivityDestroyResource
    {
        return new CarryActivityDestroyResource($useCase($id));
    }

    /**
     * 車輌の搬出依頼の一覧の取得
     *
     * @param CarryOutRequestIndexRequest $request
     * @param CarryOutRequestIndex $useCase
     * @param int $id
     * @return CarryOutRequestIndexResourceCollection
     * @apiResourceCollection Services\Lp3Cargo\App\Http\Resources\Chassis\CarryOutRequestIndexResourceCollection
     * @apiResourceModel Services\Lp3Cargo\App\Models\Chassis
     */
    public function carryOutRequestIndex(CarryOutRequestIndexRequest $request, CarryOutRequestIndex $useCase, $id): CarryOutRequestIndexResourceCollection
    {
        return new CarryOutRequestIndexResourceCollection($useCase());
    }

    /**
     * 車輌の搬出依頼
     *
     * @param CarryOutRequestStoreRequest $request
     * @param CarryOutRequestStore $useCase
     * @param int $id
     * @return CarryOutRequestStoreResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\Chassis\CarryOutRequestStoreResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\Chassis
     */
    public function carryOutRequestStore(CarryOutRequestStoreRequest $request, CarryOutRequestStore $useCase, $id): CarryOutRequestStoreResource
    {
        return new CarryOutRequestStoreResource($useCase());
    }

    /**
     * 複数車輌の搬出依頼
     *
     * @param BulkCarryOutRequestStoreRequest $request
     * @param BulkCarryOutRequestStore $useCase
     * @param int $id
     * @return BulkCarryOutRequestStoreResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\Chassis\BulkCarryOutRequestStoreResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\Chassis
     */
    public function bulkCarryOutRequestStore(BulkCarryOutRequestStoreRequest $request, BulkCarryOutRequestStore $useCase, $id): BulkCarryOutRequestStoreResource
    {
        return new BulkCarryOutRequestStoreResource($useCase());
    }

    /**
     * 車輌の搬出依頼の更新
     *
     * @param CarryOutRequestUpdateRequest $request
     * @param CarryOutRequestUpdate $useCase
     * @param int $id
     * @return CarryOutRequestUpdateResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\Chassis\CarryOutRequestUpdateResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\Chassis
     */
    public function carryOutRequestUpdate(CarryOutRequestUpdateRequest $request, CarryOutRequestUpdate $useCase, $id): CarryOutRequestUpdateResource
    {
        return new CarryOutRequestUpdateResource($useCase($id,));
    }

    /**
     * 車輌の搬出依頼のキャンセル
     *
     * @param CarryOutRequestCancelRequest $request
     * @param CarryOutRequestCancel $useCase
     * @param int $id
     * @return CarryOutRequestCancelResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\Chassis\CarryOutRequestCancelResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\Chassis
     */
    public function carryOutRequestCancel(CarryOutRequestCancelRequest $request, CarryOutRequestCancel $useCase, $id): CarryOutRequestCancelResource
    {
        return new CarryOutRequestCancelResource($useCase($id));
    }

    /**
     * 複数車輌の搬出依頼のキャンセル
     *
     * @param BulkCarryOutRequestCancelRequest $request
     * @param BulkCarryOutRequestCancel $useCase
     * @return BulkCarryOutRequestCancelResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\Chassis\BulkCarryOutRequestCancelResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\Chassis
     */
    public function bulkCarryOutRequestCancel(BulkCarryOutRequestCancelRequest $request, BulkCarryOutRequestCancel $useCase): BulkCarryOutRequestCancelResource
    {
        return new BulkCarryOutRequestCancelResource($useCase());
    }

    /**
     * 車輌の搬入登録
     *
     * @param CarryInRequest $request
     * @param CarryIn $useCase
     * @param int $id
     * @return CarryInResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\Chassis\CarryInResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\Chassis
     */
    public function carryIn(CarryInRequest $request, CarryIn $useCase, $id): CarryInResource
    {
        return new CarryInResource($useCase());
    }

    /**
     * 複数車輌の搬入登録
     *
     * @param BulkCarryInRequest $request
     * @param BulkCarryIn $useCase
     * @return BulkCarryInResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\Chassis\BulkCarryInResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\Chassis
     */
    public function bulkCarryIn(BulkCarryInRequest $request, BulkCarryIn $useCase): BulkCarryInResource
    {
        return new BulkCarryInResource($useCase());
    }

    /**
     * 車輌の搬出登録
     *
     * @param CarryOutRequest $request
     * @param CarryOut $useCase
     * @param int $id
     * @return CarryOutResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\Chassis\CarryOutResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\Chassis
     */
    public function carryOut(CarryOutRequest $request, CarryOut $useCase, $id): CarryOutResource
    {
        return new CarryOutResource($useCase());
    }

    /**
     * 複数車輌の搬出登録
     *
     * @param BulkCarryOutRequest $request
     * @param BulkCarryOut $useCase
     * @return BulkCarryOutResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\Chassis\BulkCarryOutResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\Chassis
     */
    public function bulkCarryOut(BulkCarryOutRequest $request, BulkCarryOut $useCase): BulkCarryOutResource
    {
        return new BulkCarryOutResource($useCase());
    }

    /**
     * 車輌の写真の一覧の取得
     *
     * @param PhotoIndexRequest $request
     * @param PhotoIndex $useCase
     * @param int $id
     * @return PhotoIndexResourceCollection
     * @apiResourceCollection Services\Lp3Cargo\App\Http\Resources\Chassis\PhotoIndexResourceCollection
     * @apiResourceModel Services\Lp3Cargo\App\Models\Chassis
     */
    public function photoIndex(PhotoIndexRequest $request, PhotoIndex $useCase, $id): PhotoIndexResourceCollection
    {
        return new PhotoIndexResourceCollection($useCase());
    }

    /**
     * 車輌の写真の一括作成
     *
     * @param PhotoBulkStoreRequest $request
     * @param PhotoBulkStore $useCase
     * @param int $id
     * @return PhotoBulkStoreResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\Chassis\PhotoBulkStoreResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\Chassis
     */
    public function photoBulkStore(PhotoBulkStoreRequest $request, PhotoBulkStore $useCase, $id): PhotoBulkStoreResource
    {
        return new PhotoBulkStoreResource($useCase());
    }

    /**
     * 車輌の写真の更新
     *
     * @param PhotoUpdateRequest $request
     * @param PhotoUpdate $useCase
     * @param int $id
     * @return PhotoUpdateResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\Chassis\PhotoUpdateResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\Chassis
     */
    public function photoUpdate(PhotoUpdateRequest $request, PhotoUpdate $useCase, $id): PhotoUpdateResource
    {
        return new PhotoUpdateResource($useCase($id,));
    }

    /**
     * 車輌の写真の一括更新
     *
     * @param PhotoBulkUpdateRequest $request
     * @param PhotoBulkUpdate $useCase
     * @param int $id
     * @return PhotoBulkUpdateResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\Chassis\PhotoBulkUpdateResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\Chassis
     */
    public function photoBulkUpdate(PhotoBulkUpdateRequest $request, PhotoBulkUpdate $useCase, $id): PhotoBulkUpdateResource
    {
        return new PhotoBulkUpdateResource($useCase());
    }

    /**
     * 車輌の写真の一括削除
     *
     * @param PhotoBulkDestroyRequest $request
     * @param PhotoBulkDestroy $useCase
     * @param int $id
     * @return PhotoBulkDestroyResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\Chassis\PhotoBulkDestroyResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\Chassis
     */
    public function photoBulkDestroy(PhotoBulkDestroyRequest $request, PhotoBulkDestroy $useCase, $id): PhotoBulkDestroyResource
    {
        return new PhotoBulkDestroyResource($useCase());
    }

    /**
     * 車輌の写真の一括ダウンロード
     *
     * @param PhotoBulkDownloadRequest $request
     * @param PhotoBulkDownload $useCase
     * @param int $id
     * @return PhotoBulkDownloadResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\Chassis\PhotoBulkDownloadResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\Chassis
     */
    public function photoBulkDownload(PhotoBulkDownloadRequest $request, PhotoBulkDownload $useCase, $id): PhotoBulkDownloadResource
    {
        return new PhotoBulkDownloadResource($useCase());
    }

    /**
     * 複数車輌の写真の一括ダウンロード
     *
     * @param BulkPhotoBulkDownloadRequest $request
     * @param BulkPhotoBulkDownload $useCase
     * @return BulkPhotoBulkDownloadResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\Chassis\BulkPhotoBulkDownloadResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\Chassis
     */
    public function bulkPhotoBulkDownload(BulkPhotoBulkDownloadRequest $request, BulkPhotoBulkDownload $useCase): BulkPhotoBulkDownloadResource
    {
        return new BulkPhotoBulkDownloadResource($useCase());
    }

    /**
     * 車輌の検査履歴の一覧の取得
     *
     * @param InspectionHistoryIndexRequest $request
     * @param InspectionHistoryIndex $useCase
     * @return InspectionHistoryIndexResourceCollection
     * @apiResourceCollection Services\Lp3Cargo\App\Http\Resources\Chassis\InspectionHistoryIndexResourceCollection
     * @apiResourceModel Services\Lp3Cargo\App\Models\Chassis
     */
    public function inspectionHistoryIndex(InspectionHistoryIndexRequest $request, InspectionHistoryIndex $useCase): InspectionHistoryIndexResourceCollection
    {
        return new InspectionHistoryIndexResourceCollection($useCase());
    }

    /**
     * 車輌の検査履歴の詳細の取得
     *
     * @param InspectionHistoryShowRequest $request
     * @param InspectionHistoryShow $useCase
     * @param int $id
     * @return InspectionHistoryShowResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\Chassis\InspectionHistoryShowResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\Chassis
     */
    public function inspectionHistoryShow(InspectionHistoryShowRequest $request, InspectionHistoryShow $useCase, $id): InspectionHistoryShowResource
    {
        return new InspectionHistoryShowResource($useCase($id));
    }

    /**
     * 車輌の検査履歴の作成
     *
     * @param InspectionHistoryStoreRequest $request
     * @param InspectionHistoryStore $useCase
     * @return InspectionHistoryStoreResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\Chassis\InspectionHistoryStoreResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\Chassis
     */
    public function inspectionHistoryStore(InspectionHistoryStoreRequest $request, InspectionHistoryStore $useCase): InspectionHistoryStoreResource
    {
        return new InspectionHistoryStoreResource($useCase());
    }

    /**
     * 車輌の検査履歴の更新
     *
     * @param InspectionHistoryUpdateRequest $request
     * @param InspectionHistoryUpdate $useCase
     * @param int $id
     * @return InspectionHistoryUpdateResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\Chassis\InspectionHistoryUpdateResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\Chassis
     */
    public function inspectionHistoryUpdate(InspectionHistoryUpdateRequest $request, InspectionHistoryUpdate $useCase, $id): InspectionHistoryUpdateResource
    {
        return new InspectionHistoryUpdateResource($useCase($id,));
    }

    /**
     * 車輌の検査履歴の削除
     *
     * @param InspectionHistoryDestroyRequest $request
     * @param InspectionHistoryDestroy $useCase
     * @param int $id
     * @return InspectionHistoryDestroyResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\Chassis\InspectionHistoryDestroyResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\Chassis
     */
    public function inspectionHistoryDestroy(InspectionHistoryDestroyRequest $request, InspectionHistoryDestroy $useCase, $id): InspectionHistoryDestroyResource
    {
        return new InspectionHistoryDestroyResource($useCase($id));
    }

    /**
     * 車輌の書類の一覧の取得
     *
     * @param DocumentIndexRequest $request
     * @param DocumentIndex $useCase
     * @return DocumentIndexResourceCollection
     * @apiResourceCollection Services\Lp3Cargo\App\Http\Resources\Chassis\DocumentIndexResourceCollection
     * @apiResourceModel Services\Lp3Cargo\App\Models\Chassis
     */
    public function documentIndex(DocumentIndexRequest $request, DocumentIndex $useCase): DocumentIndexResourceCollection
    {
        return new DocumentIndexResourceCollection($useCase());
    }

    /**
     * 車輌の書類の詳細の取得
     *
     * @param DocumentShowRequest $request
     * @param DocumentShow $useCase
     * @param int $id
     * @return DocumentShowResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\Chassis\DocumentShowResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\Chassis
     */
    public function documentShow(DocumentShowRequest $request, DocumentShow $useCase, $id): DocumentShowResource
    {
        return new DocumentShowResource($useCase($id));
    }

    /**
     * 車輌の書類の作成
     *
     * @param DocumentStoreRequest $request
     * @param DocumentStore $useCase
     * @return DocumentStoreResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\Chassis\DocumentStoreResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\Chassis
     */
    public function documentStore(DocumentStoreRequest $request, DocumentStore $useCase): DocumentStoreResource
    {
        return new DocumentStoreResource($useCase());
    }

    /**
     * 車輌の書類の一括作成
     *
     * @param DocumentBulkStoreRequest $request
     * @param DocumentBulkStore $useCase
     * @return DocumentBulkStoreResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\Chassis\DocumentBulkStoreResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\Chassis
     */
    public function documentBulkStore(DocumentBulkStoreRequest $request, DocumentBulkStore $useCase): DocumentBulkStoreResource
    {
        return new DocumentBulkStoreResource($useCase());
    }

    /**
     * 車輌の書類の更新
     *
     * @param DocumentUpdateRequest $request
     * @param DocumentUpdate $useCase
     * @param int $id
     * @return DocumentUpdateResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\Chassis\DocumentUpdateResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\Chassis
     */
    public function documentUpdate(DocumentUpdateRequest $request, DocumentUpdate $useCase, $id): DocumentUpdateResource
    {
        return new DocumentUpdateResource($useCase($id,));
    }

    /**
     * 車輌の書類の一括更新
     *
     * @param DocumentBulkUpdateRequest $request
     * @param DocumentBulkUpdate $useCase
     * @param int $id
     * @return DocumentBulkUpdateResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\Chassis\DocumentBulkUpdateResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\Chassis
     */
    public function documentBulkUpdate(DocumentUpdateRequest $request, DocumentBulkUpdate $useCase, $id): DocumentBulkUpdateResource
    {
        return new DocumentBulkUpdateResource($useCase($id,));
    }

    /**
     * 車輌の書類の削除
     *
     * @param DocumentDestroyRequest $request
     * @param DocumentDestroy $useCase
     * @param int $id
     * @return DocumentDestroyResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\Chassis\DocumentDestroyResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\Chassis
     */
    public function documentDestroy(DocumentDestroyRequest $request, DocumentDestroy $useCase, $id): DocumentDestroyResource
    {
        return new DocumentDestroyResource($useCase($id));
    }

    /**
     * 車輌の書類の一括削除
     *
     * @param DocumentBulkDestroyRequest $request
     * @param DocumentBulkDestroy $useCase
     * @param int $id
     * @return DocumentBulkDestroyResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\Chassis\DocumentBulkDestroyResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\Chassis
     */
    public function documentBulkDestroy(DocumentBulkDestroyRequest $request, DocumentBulkDestroy $useCase, $id): DocumentBulkDestroyResource
    {
        return new DocumentBulkDestroyResource($useCase($id));
    }

    /**
     * 車輌の書類の一括ダウンロード
     *
     * @param DocumentBulkDownloadRequest $request
     * @param DocumentBulkDownload $useCase
     * @param int $id
     * @return DocumentBulkDownloadResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\Chassis\DocumentBulkDownloadResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\Chassis
     */
    public function documentBulkDownload(DocumentBulkDownloadRequest $request, DocumentBulkDownload $useCase, $id): DocumentBulkDownloadResource
    {
        return new DocumentBulkDownloadResource($useCase($id));
    }

    /**
     * 複数車輌の書類の一括ダウンロード
     *
     * @param BulkDocumentBulkDownloadRequest $request
     * @param BulkDocumentBulkDownload $useCase
     * @return BulkDocumentBulkDownloadResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\Chassis\BulkDocumentBulkDownloadResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\Chassis
     */
    public function bulkDocumentBulkDownload(BulkDocumentBulkDownloadRequest $request, BulkDocumentBulkDownload $useCase): BulkDocumentBulkDownloadResource
    {
        return new BulkDocumentBulkDownloadResource($useCase());
    }

    /**
     * 車輌の通知
     *
     * @param NotifyRequest $request
     * @param Notify $useCase
     * @return NotifyResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\Chassis\NotifyResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\Chassis
     */
    public function notify(NotifyRequest $request, NotifyDownload $useCase): NotifyResource
    {
        return new NotifyResource($useCase());
    }

    /**
     * 車輌の共有リンクの作成
     *
     * @param SharedLinkRequest $request
     * @param SharedLink $useCase
     * @param int $id
     * @return SharedLinkResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\Chassis\SharedLinkResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\Chassis
     */
    public function sharedLink(SharedLinkRequest $request, SharedLink $useCase, $id): SharedLinkResource
    {
        return new SharedLinkResource($useCase($id));
    }

    /**
     * 車輌の詳細の取得(共有リンク用)
     *
     * @param ShareShowRequest $request
     * @param ShareShow $useCase
     * @param int $id
     * @return ShareShowResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\Chassis\ShareShowResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\Chassis
     */
    public function shareShow(ShareShowRequest $request, ShareShow $useCase, $id): ShareShowResource
    {
        return new ShareShowResource($useCase($id));
    }
}
