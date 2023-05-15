<?php

namespace Services\Lp3Job\App\Http\Controllers;

use Services\Lp3Job\App\Http\Requests\RoroJob\IndexRequest;
use Services\Lp3Job\App\Http\Requests\RoroJob\ShowRequest;
use Services\Lp3Job\App\Http\Requests\RoroJob\StoreRequest;
use Services\Lp3Job\App\Http\Requests\RoroJob\UpdateRequest;
use Services\Lp3Job\App\Http\Requests\RoroJob\DestroyRequest;
use Services\Lp3Job\App\Http\Requests\RoroJob\UpdateHistoryRequest;
use Services\Lp3Job\App\Http\Requests\RoroJob\CsvDownloadRequest;
use Services\Lp3Job\App\Http\Requests\RoroJob\ShippingMarkDownloadRequest;
use Services\Lp3Job\App\Http\Requests\RoroJob\FixRequest;
use Services\Lp3Job\App\Http\Requests\RoroJob\BulkFixRequest;
use Services\Lp3Job\App\Http\Requests\RoroJob\DocumentRequest;
use Services\Lp3Job\App\Http\Requests\RoroJob\DocumentBulkRequest;
use Services\Lp3Job\App\Http\Requests\RoroJob\DocumentBulkDestroyRequest;
use Services\Lp3Job\App\Http\Requests\RoroJob\DocumentBulkDownloadRequest;
use Services\Lp3Job\App\Http\Requests\RoroJob\BulkDocumentBulkDownloadRequest;
use Services\Lp3Job\App\Http\Requests\RoroJob\NotifyRequest;
use Services\Lp3Job\App\Http\Requests\RoroJob\SharedLinkRequest;
use Services\Lp3Job\App\Http\Requests\RoroJob\ShareRequest;

use Services\Lp3Job\App\Http\Resources\RoroJob\IndexResourceCollection;
use Services\Lp3Job\App\Http\Resources\RoroJob\ShowResource;
use Services\Lp3Job\App\Http\Resources\RoroJob\StoreResource;
use Services\Lp3Job\App\Http\Resources\RoroJob\UpdateResource;
use Services\Lp3Job\App\Http\Resources\RoroJob\DestroyResource;
use Services\Lp3Job\App\Http\Resources\RoroJob\UpdateHistoryResourceCollection;
use Services\Lp3Job\App\Http\Resources\RoroJob\CsvDownloadResource;
use Services\Lp3Job\App\Http\Resources\RoroJob\ShippingMarkDownloadResource;
use Services\Lp3Job\App\Http\Resources\RoroJob\FixResource;
use Services\Lp3Job\App\Http\Resources\RoroJob\BulkFixResource;
use Services\Lp3Job\App\Http\Resources\RoroJob\DocumentResource;
use Services\Lp3Job\App\Http\Resources\RoroJob\DocumentBulkResource;
use Services\Lp3Job\App\Http\Resources\RoroJob\DocumentBulkDestroyResource;
use Services\Lp3Job\App\Http\Resources\RoroJob\DocumentBulkDownloadResource;
use Services\Lp3Job\App\Http\Resources\RoroJob\BulkDocumentBulkDownloadResource;
use Services\Lp3Job\App\Http\Resources\RoroJob\NotifyResource;
use Services\Lp3Job\App\Http\Resources\RoroJob\SharedLinkResource;
use Services\Lp3Job\App\Http\Resources\RoroJob\ShareResource;

use Services\Lp3Job\App\Http\UseCases\RoroJob\Index;
use Services\Lp3Job\App\Http\UseCases\RoroJob\Show;
use Services\Lp3Job\App\Http\UseCases\RoroJob\Store;
use Services\Lp3Job\App\Http\UseCases\RoroJob\Update;
use Services\Lp3Job\App\Http\UseCases\RoroJob\Destroy;
use Services\Lp3Job\App\Http\UseCases\RoroJob\UpdateHistory;
use Services\Lp3Job\App\Http\UseCases\RoroJob\CsvDownload;
use Services\Lp3Job\App\Http\UseCases\RoroJob\ShippingMarkDownload;
use Services\Lp3Job\App\Http\UseCases\RoroJob\Fix;
use Services\Lp3Job\App\Http\UseCases\RoroJob\BulkFix;
use Services\Lp3Job\App\Http\UseCases\RoroJob\Document;
use Services\Lp3Job\App\Http\UseCases\RoroJob\DocumentBulk;
use Services\Lp3Job\App\Http\UseCases\RoroJob\DocumentBulkDestroy;
use Services\Lp3Job\App\Http\UseCases\RoroJob\DocumentBulkDownload;
use Services\Lp3Job\App\Http\UseCases\RoroJob\BulkDocumentBulkDownload;
use Services\Lp3Job\App\Http\UseCases\RoroJob\Notify;
use Services\Lp3Job\App\Http\UseCases\RoroJob\SharedLink;
use Services\Lp3Job\App\Http\UseCases\RoroJob\Share;

/**
 * ROROJOBコントローラー
 */
class RoroJobController extends Controller
{
    /**
     * ROROJOBの一覧の取得
     *
     * @param IndexRequest $request
     * @param Index $useCase
     * @return IndexResourceCollection
     * @apiResourceCollection Services\Lp3Job\App\Http\Resources\RoroJob\IndexResourceCollection
     * @apiResourceModel Services\Lp3Job\App\Models\RoroJob
     */
    public function index(IndexRequest $request, Index $useCase): IndexResourceCollection
    {
        return new IndexResourceCollection($useCase());
    }

    /**
     * ROROJOBの詳細
     *
     * @param ShowRequest $request
     * @param Show $useCase
     * @param int $id
     * @return ShowResource
     * @apiResource Services\Lp3Job\App\Http\Resources\RoroJob\ShowResource
     * @apiResourceModel Services\Lp3Job\App\Models\RoroJob
     */
    public function show(ShowRequest $request, Show $useCase, $id): ShowResource
    {
        return new ShowResource($useCase($id));
    }

    /**
     * ROROJOBの新規作成
     *
     * @param StoreRequest $request
     * @param Store $useCase
     * @return StoreResource
     * @apiResource Services\Lp3Job\App\Http\Resources\RoroJob\StoreResource
     * @apiResourceModel Services\Lp3Job\App\Models\RoroJob
     */
    public function store(StoreRequest $request, Store $useCase): StoreResource
    {
        return new StoreResource($useCase());
    }

    /**
     * ROROJOBの更新
     *
     * @param UpdateRequest $request
     * @param Update $useCase
     * @param int $id
     * @return UpdateResource
     * @apiResource Services\Lp3Job\App\Http\Resources\RoroJob\UpdateResource
     * @apiResourceModel Services\Lp3Job\App\Models\RoroJob
     */
    public function update(UpdateRequest $request, Update $useCase, $id): UpdateResource
    {
        return new UpdateResource($useCase($id));
    }

    /**
     * ROROJOBの削除
     *
     * @param DestroyRequest $request
     * @param Destroy $useCase
     * @param int $id
     * @return DestroyResource
     * @apiResource Services\Lp3Job\App\Http\Resources\RoroJob\DestroyResource
     * @apiResourceModel Services\Lp3Job\App\Models\RoroJob
     */
    public function destroy(DestroyRequest $request, Destroy $useCase, $id): DestroyResource
    {
        return new DestroyResource($useCase($id));
    }

    /**
     * ROROJOBの変更履歴の一覧
     *
     * @param UpdateHistoryRequest $request
     * @param UpdateHistory $useCase
     * @param int $id
     * @return UpdateHistoryResourceCollection
     * @apiResourceCollection Services\Lp3Job\App\Http\Resources\RoroJob\UpdateHistoryResourceCollection
     * @apiResourceModel Services\Lp3Job\App\Models\RoroJob
     */
    public function updateHistory(UpdateHistoryRequest $request, UpdateHistory $useCase, $id): UpdateHistoryResourceCollection
    {
        return new UpdateHistoryResourceCollection($useCase($id));
    }

    /**
     * 複数ROROJOBのCSVダウンロード
     *
     * @param CsvDownloadRequest $request
     * @param CsvDownload $useCase
     * @return CsvDownloadResource
     * @apiResource Services\Lp3Job\App\Http\Resources\RoroJob\CsvDownloadResource
     * @apiResourceModel Services\Lp3Job\App\Models\RoroJob
     */
    public function csvDownload(CsvDownloadRequest $request, CsvDownload $useCase): CsvDownloadResource
    {
        return new CsvDownloadResource($useCase());
    }

    /**
     * 複数ROROJOBのSHIPPING MARKのダウンロード
     *
     * @param ShippingMarkDownloadRequest $request
     * @param ShippingMarkDownload $useCase
     * @return ShippingMarkDownloadResource
     * @apiResource Services\Lp3Job\App\Http\Resources\RoroJob\ShippingMarkDownloadResource
     * @apiResourceModel Services\Lp3Job\App\Models\RoroJob
     */
    public function shippingMarkDownload(ShippingMarkDownloadRequest $request, ShippingMarkDownload $useCase): ShippingMarkDownloadResource
    {
        return new ShippingMarkDownloadResource($useCase());
    }

    /**
     * ROROJOBの実施確定
     *
     * @param FixRequest $request
     * @param Fix $useCase
     * @param int $id
     * @return FixResource
     * @apiResource Services\Lp3Job\App\Http\Resources\RoroJob\FixResource
     * @apiResourceModel Services\Lp3Job\App\Models\RoroJob
     */
    public function fix(FixRequest $request, Fix $useCase, $id): FixResource
    {
        return new FixResource($useCase($id));
    }

    /**
     * 複数ROROJOBの実施確定
     *
     * @param BulkFixRequest $request
     * @param BulkFix $useCase
     * @return BulkFixResource
     * @apiResource Services\Lp3Job\App\Http\Resources\RoroJob\BulkFixResource
     * @apiResourceModel Services\Lp3Job\App\Models\RoroJob
     */
    public function bulkFix(BulkFixRequest $request, BulkFix $useCase): BulkFixResource
    {
        return new BulkFixResource($useCase());
    }

    /**
     * コンテナJOBの書類の一覧
     *
     * @param DocumentRequest $request
     * @param Document $useCase
     * @param int $id
     * @return DocumentResource
     * @apiResource Services\Lp3Job\App\Http\Resources\RoroJob\DocumentResource
     * @apiResourceModel Services\Lp3Job\App\Models\RoroJob
     */
    public function document(DocumentRequest $request, Document $useCase, $id): DocumentResource
    {
        return new DocumentResource($useCase($id));
    }

    /**
     * コンテナJOBの書類の一括作成
     *
     * @param DocumentBulkRequest $request
     * @param DocumentBulk $useCase
     * @param int $id
     * @return DocumentBulkResource
     * @apiResource Services\Lp3Job\App\Http\Resources\RoroJob\DocumentBulkResource
     * @apiResourceModel Services\Lp3Job\App\Models\RoroJob
     */
    public function documentBulk(DocumentBulkRequest $request, DocumentBulk $useCase, $id): DocumentBulkResource
    {
        return new DocumentBulkResource($useCase($id));
    }

    /**
     * コンテナJOBの書類の一括削除
     *
     * @param DocumentBulkDestroyRequest $request
     * @param DocumentBulkDestroy $useCase
     * @param int $id
     * @return DocumentBulkDestroyResource
     * @apiResource Services\Lp3Job\App\Http\Resources\RoroJob\DocumentBulkDestroyResource
     * @apiResourceModel Services\Lp3Job\App\Models\RoroJob
     */
    public function documentBulkDestroy(DocumentBulkDestroyRequest $request, DocumentBulkDestroy $useCase, $id): DocumentBulkDestroyResource
    {
        return new DocumentBulkDestroyResource($useCase($id));
    }

    /**
     * コンテナJOBの書類の一括ダウンロード
     *
     * @param DocumentBulkDownloadRequest $request
     * @param DocumentBulkDownload $useCase
     * @param int $id
     * @return DocumentBulkDownloadResource
     * @apiResource Services\Lp3Job\App\Http\Resources\RoroJob\DocumentBulkDownloadResource
     * @apiResourceModel Services\Lp3Job\App\Models\RoroJob
     */
    public function documentBulkDownload(DocumentBulkDownloadRequest $request, DocumentBulkDownload $useCase, $id): DocumentBulkDownloadResource
    {
        return new DocumentBulkDownloadResource($useCase($id));
    }

    /**
     * 複数コンテナJOBの書類の一括ダウンロード
     *
     * @param BulkDocumentBulkDownloadRequest $request
     * @param BulkDocumentBulkDownload $useCase
     * @return BulkDocumentBulkDownloadResource
     * @apiResource Services\Lp3Job\App\Http\Resources\RoroJob\BulkDocumentBulkDownloadResource
     * @apiResourceModel Services\Lp3Job\App\Models\RoroJob
     */
    public function bulkDocumentBulkDownload(BulkDocumentBulkDownloadRequest $request, BulkDocumentBulkDownload $useCase): BulkDocumentBulkDownloadResource
    {
        return new BulkDocumentBulkDownloadResource($useCase());
    }

    /**
     * コンテナJOBの通知
     *
     * @param NotifyRequest $request
     * @param Notify $useCase
     * @return NotifyResource
     * @apiResource Services\Lp3Job\App\Http\Resources\RoroJob\NotifyResource
     * @apiResourceModel Services\Lp3Job\App\Models\RoroJob
     */
    public function notify(NotifyRequest $request, Notify $useCase): NotifyResource
    {
        return new NotifyResource($useCase());
    }

    /**
     * コンテナJOBの共有リンクの作成
     *
     * @param SharedLinkRequest $request
     * @param SharedLink $useCase
     * @param int $id
     * @return SharedLinkResource
     * @apiResource Services\Lp3Job\App\Http\Resources\RoroJob\SharedLinkResource
     * @apiResourceModel Services\Lp3Job\App\Models\RoroJob
     */
    public function sharedLink(SharedLinkRequest $request, SharedLink $useCase, $id): SharedLinkResource
    {
        return new SharedLinkResource($useCase($id));
    }

    /**
     * コンテナJOBの詳細の取得(共有リンク用)
     *
     * @param ShareRequest $request
     * @param Share $useCase
     * @return ShareResource
     * @apiResource Services\Lp3Job\App\Http\Resources\RoroJob\ShareResource
     * @apiResourceModel Services\Lp3Job\App\Models\RoroJob
     */
    public function share(ShareRequest $request, Share $useCase): ShareResource
    {
        return new ShareResource($useCase());
    }
}
