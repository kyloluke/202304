<?php

namespace Services\Lp3Job\App\Http\Controllers;

use Services\Lp3Job\App\Http\Requests\ContJob\IndexRequest;
use Services\Lp3Job\App\Http\Requests\ContJob\ShowRequest;
use Services\Lp3Job\App\Http\Requests\ContJob\StoreRequest;
use Services\Lp3Job\App\Http\Requests\ContJob\UpdateRequest;
use Services\Lp3Job\App\Http\Requests\ContJob\DestroyRequest;
use Services\Lp3Job\App\Http\Requests\ContJob\UpdateHistoryRequest;
use Services\Lp3Job\App\Http\Requests\ContJob\CsvDownloadRequest;
use Services\Lp3Job\App\Http\Requests\ContJob\InstructionDownloadRequest;
use Services\Lp3Job\App\Http\Requests\ContJob\ScheduledDatetimeRequest;
use Services\Lp3Job\App\Http\Requests\ContJob\FixRequest;
use Services\Lp3Job\App\Http\Requests\ContJob\BulkFixRequest;
use Services\Lp3Job\App\Http\Requests\ContJob\PhotoIndexRequest;
use Services\Lp3Job\App\Http\Requests\ContJob\PhotoShowRequest;
use Services\Lp3Job\App\Http\Requests\ContJob\PhotoStoreRequest;
use Services\Lp3Job\App\Http\Requests\ContJob\PhotoBulkStoreRequest;
use Services\Lp3Job\App\Http\Requests\ContJob\PhotoUpdateRequest;
use Services\Lp3Job\App\Http\Requests\ContJob\PhotoBulkUpdateRequest;
use Services\Lp3Job\App\Http\Requests\ContJob\PhotoDestroyRequest;
use Services\Lp3Job\App\Http\Requests\ContJob\PhotoBulkDestroyRequest;
use Services\Lp3Job\App\Http\Requests\ContJob\PhotoBulkRequest;
use Services\Lp3Job\App\Http\Requests\ContJob\DocumentRequest;
use Services\Lp3Job\App\Http\Requests\ContJob\DocumentBulkRequest;
use Services\Lp3Job\App\Http\Requests\ContJob\DocumentBulkDestroyRequest;
use Services\Lp3Job\App\Http\Requests\ContJob\DocumentBulkDownloadRequest;
use Services\Lp3Job\App\Http\Requests\ContJob\BulkDocumentBulkDownloadRequest;
use Services\Lp3Job\App\Http\Requests\ContJob\NotifyRequest;
use Services\Lp3Job\App\Http\Requests\ContJob\SharedLinkRequest;
use Services\Lp3Job\App\Http\Requests\ContJob\ShareRequest;

use Services\Lp3Job\App\Http\Resources\ContJob\IndexResourceCollection;
use Services\Lp3Job\App\Http\Resources\ContJob\ShowResource;
use Services\Lp3Job\App\Http\Resources\ContJob\StoreResource;
use Services\Lp3Job\App\Http\Resources\ContJob\UpdateResource;
use Services\Lp3Job\App\Http\Resources\ContJob\DestroyResource;
use Services\Lp3Job\App\Http\Resources\ContJob\UpdateHistoryResourceCollection;
use Services\Lp3Job\App\Http\Resources\ContJob\CsvDownloadResource;
use Services\Lp3Job\App\Http\Resources\ContJob\InstructionDownloadResource;
use Services\Lp3Job\App\Http\Resources\ContJob\ScheduledDatetimeResource;
use Services\Lp3Job\App\Http\Resources\ContJob\FixResource;
use Services\Lp3Job\App\Http\Resources\ContJob\BulkFixResource;
use Services\Lp3Job\App\Http\Resources\ContJob\PhotoIndexResourceCollection;
use Services\Lp3Job\App\Http\Resources\ContJob\PhotoShowResource;
use Services\Lp3Job\App\Http\Resources\ContJob\PhotoStoreResource;
use Services\Lp3Job\App\Http\Resources\ContJob\PhotoBulkStoreResource;
use Services\Lp3Job\App\Http\Resources\ContJob\PhotoUpdateResource;
use Services\Lp3Job\App\Http\Resources\ContJob\PhotoBulkUpdateResource;
use Services\Lp3Job\App\Http\Resources\ContJob\PhotoDestroyResource;
use Services\Lp3Job\App\Http\Resources\ContJob\PhotoBulkDestroyResource;
use Services\Lp3Job\App\Http\Resources\ContJob\PhotoBulkResource;
use Services\Lp3Job\App\Http\Resources\ContJob\DocumentResource;
use Services\Lp3Job\App\Http\Resources\ContJob\DocumentBulkResource;
use Services\Lp3Job\App\Http\Resources\ContJob\DocumentBulkDestroyResource;
use Services\Lp3Job\App\Http\Resources\ContJob\DocumentBulkDownloadResource;
use Services\Lp3Job\App\Http\Resources\ContJob\BulkDocumentBulkDownloadResource;
use Services\Lp3Job\App\Http\Resources\ContJob\NotifyResource;
use Services\Lp3Job\App\Http\Resources\ContJob\SharedLinkResource;
use Services\Lp3Job\App\Http\Resources\ContJob\ShareResource;

use Services\Lp3Job\App\Http\UseCases\ContJob\Index;
use Services\Lp3Job\App\Http\UseCases\ContJob\Show;
use Services\Lp3Job\App\Http\UseCases\ContJob\Store;
use Services\Lp3Job\App\Http\UseCases\ContJob\Update;
use Services\Lp3Job\App\Http\UseCases\ContJob\Destroy;
use Services\Lp3Job\App\Http\UseCases\ContJob\UpdateHistory;
use Services\Lp3Job\App\Http\UseCases\ContJob\CsvDownload;
use Services\Lp3Job\App\Http\UseCases\ContJob\InstructionDownload;
use Services\Lp3Job\App\Http\UseCases\ContJob\ScheduledDatetime;
use Services\Lp3Job\App\Http\UseCases\ContJob\Fix;
use Services\Lp3Job\App\Http\UseCases\ContJob\BulkFix;
use Services\Lp3Job\App\Http\UseCases\ContJob\PhotoIndex;
use Services\Lp3Job\App\Http\UseCases\ContJob\PhotoShow;
use Services\Lp3Job\App\Http\UseCases\ContJob\PhotoStore;
use Services\Lp3Job\App\Http\UseCases\ContJob\PhotoBulkStore;
use Services\Lp3Job\App\Http\UseCases\ContJob\PhotoUpdate;
use Services\Lp3Job\App\Http\UseCases\ContJob\PhotoBulkUpdate;
use Services\Lp3Job\App\Http\UseCases\ContJob\PhotoDestroy;
use Services\Lp3Job\App\Http\UseCases\ContJob\PhotoBulkDestroy;
use Services\Lp3Job\App\Http\UseCases\ContJob\PhotoBulk;
use Services\Lp3Job\App\Http\UseCases\ContJob\Document;
use Services\Lp3Job\App\Http\UseCases\ContJob\DocumentBulk;
use Services\Lp3Job\App\Http\UseCases\ContJob\DocumentBulkDestroy;
use Services\Lp3Job\App\Http\UseCases\ContJob\DocumentBulkDownload;
use Services\Lp3Job\App\Http\UseCases\ContJob\BulkDocumentBulkDownload;
use Services\Lp3Job\App\Http\UseCases\ContJob\Notify;
use Services\Lp3Job\App\Http\UseCases\ContJob\SharedLink;
use Services\Lp3Job\App\Http\UseCases\ContJob\Share;

/**
 * コンテナJOBコントローラー
 */
class ContJobController extends Controller
{
    /**
     * コンテナJOBの一覧の取得
     *
     * @param IndexRequest $request
     * @param Index $useCase
     * @return IndexResourceCollection
     * @apiResourceCollection Services\Lp3Job\App\Http\Resources\ContJob\IndexResourceCollection
     * @apiResourceModel Services\Lp3Job\App\Models\ContJob
     */
    public function index(IndexRequest $request, Index $useCase): IndexResourceCollection
    {
        return new IndexResourceCollection($useCase());
    }

    /**
     * コンテナJOBの詳細
     *
     * @param ShowRequest $request
     * @param Show $useCase
     * @param int $id
     * @return ShowResource
     * @apiResource Services\Lp3Job\App\Http\Resources\ContJob\ShowResource
     * @apiResourceModel Services\Lp3Job\App\Models\ContJob
     */
    public function show(ShowRequest $request, Show $useCase, $id): ShowResource
    {
        return new ShowResource($useCase($id));
    }

    /**
     * コンテナJOBの新規作成
     *
     * @param StoreRequest $request
     * @param Store $useCase
     * @return StoreResource
     * @apiResource Services\Lp3Job\App\Http\Resources\ContJob\StoreResource
     * @apiResourceModel Services\Lp3Job\App\Models\ContJob
     */
    public function store(StoreRequest $request, Store $useCase): StoreResource
    {
        return new StoreResource($useCase());
    }

    /**
     * コンテナJOBの更新
     *
     * @param UpdateRequest $request
     * @param Update $useCase
     * @param int $id
     * @return UpdateResource
     * @apiResource Services\Lp3Job\App\Http\Resources\ContJob\UpdateResource
     * @apiResourceModel Services\Lp3Job\App\Models\ContJob
     */
    public function update(UpdateRequest $request, Update $useCase, $id): UpdateResource
    {
        return new UpdateResource($useCase($id));
    }

    /**
     * コンテナJOBの削除
     *
     * @param DestroyRequest $request
     * @param Destroy $useCase
     * @param int $id
     * @return DestroyResource
     * @apiResource Services\Lp3Job\App\Http\Resources\ContJob\DestroyResource
     * @apiResourceModel Services\Lp3Job\App\Models\ContJob
     */
    public function destroy(DestroyRequest $request, Destroy $useCase, $id): DestroyResource
    {
        return new DestroyResource($useCase($id));
    }

    /**
     * コンテナJOBの変更履歴の一覧
     *
     * @param UpdateHistoryRequest $request
     * @param UpdateHistory $useCase
     * @param int $id
     * @return UpdateHistoryResourceCollection
     * @apiResourceCollection Services\Lp3Job\App\Http\Resources\ContJob\UpdateHistoryResourceCollection
     * @apiResourceModel Services\Lp3Job\App\Models\ContJob
     */
    public function updateHistory(UpdateHistoryRequest $request, UpdateHistory $useCase, $id): UpdateHistoryResourceCollection
    {
        return new UpdateHistoryResourceCollection($useCase($id));
    }

    /**
     * 複数コンテナJOBのCSVダウンロード
     *
     * @param CsvDownloadRequest $request
     * @param CsvDownload $useCase
     * @return CsvDownloadResource
     * @apiResource Services\Lp3Job\App\Http\Resources\ContJob\CsvDownloadResource
     * @apiResourceModel Services\Lp3Job\App\Models\ContJob
     */
    public function csvDownload(CsvDownloadRequest $request, CsvDownload $useCase): CsvDownloadResource
    {
        return new CsvDownloadResource($useCase());
    }

    /**
     * 複数コンテナJOBの作業指示書ダウンロード
     *
     * @param InstructionDownloadRequest $request
     * @param InstructionDownload $useCase
     * @return InstructionDownloadResource
     * @apiResource Services\Lp3Job\App\Http\Resources\ContJob\InstructionDownloadResource
     * @apiResourceModel Services\Lp3Job\App\Models\ContJob
     */
    public function instructionDownload(InstructionDownloadRequest $request, InstructionDownload $useCase): InstructionDownloadResource
    {
        return new InstructionDownloadResource($useCase());
    }

    /**
     * 複数コンテナJOBの作業スケジュールの更新
     *
     * @param ScheduledDatetimeRequest $request
     * @param ScheduledDatetime $useCase
     * @return ScheduledDatetimeResource
     * @apiResource Services\Lp3Job\App\Http\Resources\ContJob\ScheduledDatetimeResource
     * @apiResourceModel Services\Lp3Job\App\Models\ContJob
     */
    public function scheduledDatetime(ScheduledDatetimeRequest $request, ScheduledDatetime $useCase): ScheduledDatetimeResource
    {
        return new ScheduledDatetimeResource($useCase());
    }

    /**
     * コンテナJOBの実施確定
     *
     * @param FixRequest $request
     * @param Fix $useCase
     * @param int $id
     * @return FixResource
     * @apiResource Services\Lp3Job\App\Http\Resources\ContJob\FixResource
     * @apiResourceModel Services\Lp3Job\App\Models\ContJob
     */
    public function fix(FixRequest $request, Fix $useCase, $id): FixResource
    {
        return new FixResource($useCase($id));
    }

    /**
     * 複数コンテナJOBの実施確定
     *
     * @param BulkFixRequest $request
     * @param BulkFix $useCase
     * @return BulkFixResource
     * @apiResource Services\Lp3Job\App\Http\Resources\ContJob\BulkFixResource
     * @apiResourceModel Services\Lp3Job\App\Models\ContJob
     */
    public function bulkFix(BulkFixRequest $request, BulkFix $useCase): BulkFixResource
    {
        return new BulkFixResource($useCase());
    }

    /**
     * コンテナJOBの写真の一覧の取得
     *
     * @param PhotoIndexRequest $request
     * @param PhotoIndex $useCase
     * @param int $id
     * @return PhotoIndexResourceCollection
     * @apiResourceCollection Services\Lp3Job\App\Http\Resources\ContJob\PhotoIndexResourceCollection
     * @apiResourceModel Services\Lp3Job\App\Models\ContJob
     */
    public function photoIndex(PhotoIndexRequest $request, PhotoIndex $useCase, $id): PhotoIndexResourceCollection
    {
        return new PhotoIndexResourceCollection($useCase());
    }

    /**
     * コンテナJOBの写真の詳細
     *
     * @param PhotoShowRequest $request
     * @param PhotoShow $useCase
     * @param int $id
     * @return PhotoShowResource
     * @apiResource Services\Lp3Job\App\Http\Resources\ContJob\PhotoShowResource
     * @apiResourceModel Services\Lp3Job\App\Models\ContJob
     */
    public function photoShow(PhotoShowRequest $request, PhotoShow $useCase, $id): PhotoShowResource
    {
        return new PhotoShowResource($useCase($id));
    }

    /**
     * コンテナJOBの写真の新規作成
     *
     * @param PhotoStoreRequest $request
     * @param PhotoStore $useCase
     * @param int $id
     * @return PhotoStoreResource
     * @apiResource Services\Lp3Job\App\Http\Resources\ContJob\PhotoStoreResource
     * @apiResourceModel Services\Lp3Job\App\Models\ContJob
     */
    public function photoStore(PhotoStoreRequest $request, PhotoStore $useCase, $id): PhotoStoreResource
    {
        return new PhotoStoreResource($useCase());
    }

    /**
     * コンテナJOBの写真の一括作成
     *
     * @param PhotoBulkStoreRequest $request
     * @param PhotoBulkStore $useCase
     * @param int $id
     * @return PhotoBulkStoreResource
     * @apiResource Services\Lp3Job\App\Http\Resources\ContJob\PhotoBulkStoreResource
     * @apiResourceModel Services\Lp3Job\App\Models\ContJob
     */
    public function photoBulkStore(PhotoBulkStoreRequest $request, PhotoBulkStore $useCase, $id): PhotoBulkStoreResource
    {
        return new PhotoBulkStoreResource($useCase());
    }

    /**
     * コンテナJOBの写真の更新
     *
     * @param PhotoUpdateRequest $request
     * @param PhotoUpdate $useCase
     * @param int $id
     * @return PhotoUpdateResource
     * @apiResource Services\Lp3Job\App\Http\Resources\ContJob\PhotoUpdateResource
     * @apiResourceModel Services\Lp3Job\App\Models\ContJob
     */
    public function photoUpdate(PhotoUpdateRequest $request, PhotoUpdate $useCase, $id): PhotoUpdateResource
    {
        return new PhotoUpdateResource($useCase($id));
    }

    /**
     * コンテナJOBの写真の一括更新
     *
     * @param PhotoBulkUpdateRequest $request
     * @param PhotoBulkUpdate $useCase
     * @param int $id
     * @return PhotoBulkUpdateResource
     * @apiResource Services\Lp3Job\App\Http\Resources\ContJob\PhotoBulkUpdateResource
     * @apiResourceModel Services\Lp3Job\App\Models\ContJob
     */
    public function photoBulkUpdate(PhotoBulkUpdateRequest $request, PhotoBulkUpdate $useCase, $id): PhotoBulkUpdateResource
    {
        return new PhotoBulkUpdateResource($useCase($id));
    }

    /**
     * コンテナJOBの写真の削除
     *
     * @param PhotoDestroyRequest $request
     * @param PhotoDestroy $useCase
     * @param int $id
     * @return PhotoDestroyResource
     * @apiResource Services\Lp3Job\App\Http\Resources\ContJob\PhotoDestroyResource
     * @apiResourceModel Services\Lp3Job\App\Models\ContJob
     */
    public function photoDestroy(PhotoDestroyRequest $request, PhotoDestroy $useCase, $id): PhotoDestroyResource
    {
        return new PhotoDestroyResource($useCase($id));
    }

    /**
     * コンテナJOBの写真の一括削除
     *
     * @param PhotoBulkDestroyRequest $request
     * @param PhotoBulkDestroy $useCase
     * @param int $id
     * @return PhotoBulkDestroyResource
     * @apiResource Services\Lp3Job\App\Http\Resources\ContJob\PhotoBulkDestroyResource
     * @apiResourceModel Services\Lp3Job\App\Models\ContJob
     */
    public function photoBulkDestroy(PhotoBulkDestroyRequest $request, PhotoBulkDestroy $useCase, $id): PhotoBulkDestroyResource
    {
        return new PhotoBulkDestroyResource($useCase($id));
    }

    /**
     * 複数コンテナJOBの写真の一括ダウンロード
     *
     * @param PhotoBulkRequest $request
     * @param PhotoBulk $useCase
     * @return PhotoBulkResource
     * @apiResource Services\Lp3Job\App\Http\Resources\ContJob\PhotoBulkResource
     * @apiResourceModel Services\Lp3Job\App\Models\ContJob
     */
    public function photoBulk(PhotoBulk\Request $request, PhotoBulk $useCase): PhotoBulkResource
    {
        return new PhotoBulkResource($useCase());
    }

    /**
     * コンテナJOBの書類の一覧
     *
     * @param DocumentRequest $request
     * @param Document $useCase
     * @param int $id
     * @return DocumentResource
     * @apiResource Services\Lp3Job\App\Http\Resources\ContJob\DocumentResource
     * @apiResourceModel Services\Lp3Job\App\Models\ContJob
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
     * @apiResource Services\Lp3Job\App\Http\Resources\ContJob\DocumentBulkResource
     * @apiResourceModel Services\Lp3Job\App\Models\ContJob
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
     * @apiResource Services\Lp3Job\App\Http\Resources\ContJob\DocumentBulkDestroyResource
     * @apiResourceModel Services\Lp3Job\App\Models\ContJob
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
     * @apiResource Services\Lp3Job\App\Http\Resources\ContJob\DocumentBulkDownloadResource
     * @apiResourceModel Services\Lp3Job\App\Models\ContJob
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
     * @apiResource Services\Lp3Job\App\Http\Resources\ContJob\BulkDocumentBulkDownloadResource
     * @apiResourceModel Services\Lp3Job\App\Models\ContJob
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
     * @apiResource Services\Lp3Job\App\Http\Resources\ContJob\NotifyResource
     * @apiResourceModel Services\Lp3Job\App\Models\ContJob
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
     * @apiResource Services\Lp3Job\App\Http\Resources\ContJob\SharedLinkResource
     * @apiResourceModel Services\Lp3Job\App\Models\ContJob
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
     * @apiResource Services\Lp3Job\App\Http\Resources\ContJob\ShareResource
     * @apiResourceModel Services\Lp3Job\App\Models\ContJob
     */
    public function share(ShareRequest $request, Share $useCase): ShareResource
    {
        return new ShareResource($useCase());
    }
}
