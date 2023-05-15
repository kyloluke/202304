<?php

namespace Services\Lp3Core\App\Http\Controllers;

use Services\Lp3Core\App\Http\Requests\Port\IndexRequest;
use Services\Lp3Core\App\Http\Requests\Port\StoreRequest;
use Services\Lp3Core\App\Http\Requests\Port\UpdateRequest;
use Services\Lp3Core\App\Http\Requests\Port\DestroyRequest;
use Services\Lp3Core\App\Http\Requests\Port\ShowRequest;
use Services\Lp3Core\App\Http\Requests\Port\CsvDownloadRequest;
use Services\Lp3Core\App\Http\Resources\Port\IndexResourceCollection;
use Services\Lp3Core\App\Http\Resources\Port\StoreResource;
use Services\Lp3Core\App\Http\Resources\Port\ShowResource;
use Services\Lp3Core\App\Http\Resources\Port\UpdateResource;
use Services\Lp3Core\App\Http\Resources\Port\DestroyResource;
use Services\Lp3Core\App\Http\Resources\Port\CsvDownloadResource;
use Services\Lp3Core\App\Http\UseCases\Port\Index;
use Services\Lp3Core\App\Http\UseCases\Port\Update;
use Services\Lp3Core\App\Http\UseCases\Port\Store;
use Services\Lp3Core\App\Http\UseCases\Port\Show;
use Services\Lp3Core\App\Http\UseCases\Port\Destroy;
use Services\Lp3Core\App\Http\UseCases\Port\CsvDownload;

/**
 * 港コントローラー
 */
class PortController extends Controller
{
    /**
     * 港の一覧の取得
     *
     * @param IndexRequest $request
     * @param Index $useCase
     * @return IndexResourceCollection
     * @apiResourceCollection Services\Lp3Core\App\Http\Resources\Port\IndexResourceCollection
     * @apiResourceModel Services\Lp3Core\App\Models\Port
     */
    public function index(IndexRequest $request, Index $useCase): IndexResourceCollection
    {
        return new IndexResourceCollection($useCase());
    }

    /**
     * 港の新規作成
     *
     * @param StoreRequest $request
     * @param Store $useCase
     * @return StoreResource
     * @apiResource Services\Lp3Core\App\Http\Resources\Port\StoreResource
     * @apiResourceModel Services\Lp3Core\App\Models\Port
     */
    public function store(StoreRequest $request, Store $useCase): StoreResource
    {
        return new StoreResource($useCase($request->all()));
    }

    /**
     * 港の詳細
     *
     * @param ShowRequest $request
     * @param Show $useCase
     * @return ShowResource
     * @apiResource Services\Lp3Core\App\Http\Resources\Port\ShowResource
     * @apiResourceModel Services\Lp3Core\App\Models\Port
     */
    public function show(ShowRequest $request, Show $useCase, $id): ShowResource
    {
        return new ShowResource($useCase($id));
    }

    /**
     * 港の更新
     *
     * @param UpdateRequest $request
     * @param Update $useCase
     * @return UpdateResource
     * @apiResource Services\Lp3Core\App\Http\Resources\Port\UpdateResource
     * @apiResourceModel Services\Lp3Core\App\Models\Port
     */
    public function update(UpdateRequest $request, Update $useCase, $id): UpdateResource
    {
        return new UpdateResource($useCase($id, $request->all()));
    }

    /**
     * 港の削除
     *
     * @param DestroyRequest $request
     * @param Destroy $useCase
     * @return DestroyResource
     * @apiResource Services\Lp3Core\App\Http\Resources\Port\DestroyResource
     * @apiResourceModel Services\Lp3Core\App\Models\Port
     */
    public function destroy(DestroyRequest $request, Destroy $useCase, $id): DestroyResource
    {
        return new DestroyResource($useCase($id));
    }

    /**
     * 港のCSVダウンロード
     *
     * @param CsvDownloadRequest $request
     * @param CsvDownload $useCase
     * @return CsvDownloadResource
     * @apiResource Services\Lp3Core\App\Http\Resources\Port\CsvDownloadResource
     * @apiResourceModel Services\Lp3Core\App\Models\Port
     */
    public function csvDownload(CsvDownloadRequest $request, CsvDownload $useCase): CsvDownloadResource
    {
        return new CsvDownloadResource($useCase());
    }

}
