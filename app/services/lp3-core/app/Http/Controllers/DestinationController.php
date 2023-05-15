<?php

namespace Services\Lp3Core\App\Http\Controllers;

use Services\Lp3Core\App\Http\Requests\Destination\IndexRequest;
use Services\Lp3Core\App\Http\Requests\Destination\StoreRequest;
use Services\Lp3Core\App\Http\Requests\Destination\UpdateRequest;
use Services\Lp3Core\App\Http\Requests\Destination\DestroyRequest;
use Services\Lp3Core\App\Http\Requests\Destination\ShowRequest;
use Services\Lp3Core\App\Http\Requests\Destination\CsvDownloadRequest;
use Services\Lp3Core\App\Http\Resources\Destination\IndexResourceCollection;
use Services\Lp3Core\App\Http\Resources\Destination\StoreResource;
use Services\Lp3Core\App\Http\Resources\Destination\ShowResource;
use Services\Lp3Core\App\Http\Resources\Destination\UpdateResource;
use Services\Lp3Core\App\Http\Resources\Destination\DestroyResource;
use Services\Lp3Core\App\Http\Resources\Destination\CsvDownloadResource;
use Services\Lp3Core\App\Http\UseCases\Destination\Index;
use Services\Lp3Core\App\Http\UseCases\Destination\Update;
use Services\Lp3Core\App\Http\UseCases\Destination\Store;
use Services\Lp3Core\App\Http\UseCases\Destination\Show;
use Services\Lp3Core\App\Http\UseCases\Destination\Destroy;
use Services\Lp3Core\App\Http\UseCases\Destination\CsvDownload;

/**
 * 仕向地コントローラー
 */
class DestinationController extends Controller
{
    /**
     * 仕向地の一覧の取得
     *
     * @param IndexRequest $request
     * @param Index $useCase
     * @return IndexResourceCollection
     * @apiResourceCollection Services\Lp3Core\App\Http\Resources\Destination\IndexResourceCollection
     * @apiResourceModel Services\Lp3Core\App\Models\Destination
     */
    public function index(IndexRequest $request, Index $useCase): IndexResourceCollection
    {
        return new IndexResourceCollection($useCase($request->all()));
    }

    /**
     * 仕向地の新規作成
     *
     * @param StoreRequest $request
     * @param Store $useCase
     * @return StoreResource
     * @apiResource Services\Lp3Core\App\Http\Resources\Destination\StoreResource
     * @apiResourceModel Services\Lp3Core\App\Models\Destination
     */
    public function store(StoreRequest $request, Store $useCase): StoreResource
    {
        return new StoreResource($useCase($request->all()));
    }

    /**
     * 仕向地の詳細
     *
     * @param ShowRequest $request
     * @param Show $useCase
     * @return ShowResource
     * @apiResource Services\Lp3Core\App\Http\Resources\Destination\ShowResource
     * @apiResourceModel Services\Lp3Core\App\Models\Destination
     */
    public function show(ShowRequest $request, Show $useCase, $id): ShowResource
    {
        return new ShowResource($useCase($id));
    }

    /**
     * 仕向地の更新
     *
     * @param UpdateRequest $request
     * @param Update $useCase
     * @return UpdateResource
     * @apiResource Services\Lp3Core\App\Http\Resources\Destination\UpdateResource
     * @apiResourceModel Services\Lp3Core\App\Models\Destination
     */
    public function update(UpdateRequest $request, Update $useCase, $id): UpdateResource
    {
        return new UpdateResource($useCase($id, $request->all()));
    }

    /**
     * 仕向地の削除
     *
     * @param DestroyRequest $request
     * @param Destroy $useCase
     * @return DestroyResource
     * @apiResource Services\Lp3Core\App\Http\Resources\Destination\DestroyResource
     * @apiResourceModel Services\Lp3Core\App\Models\Destination
     */
    public function destroy(DestroyRequest $request, Destroy $useCase, $id): DestroyResource
    {
        return new DestroyResource($useCase($id));
    }

    /**
     * 仕向地のCSVダウンロード
     *
     * @param CsvDownloadRequest $request
     * @param CsvDownload $useCase
     * @return CsvDownloadResource
     * @apiResource Services\Lp3Core\App\Http\Resources\Destination\CsvDownloadResource
     * @apiResourceModel Services\Lp3Core\App\Models\Destination
     */
    public function csvDownload(CsvDownloadRequest $request, CsvDownload $useCase): CsvDownloadResource
    {
        return new CsvDownloadResource($useCase());
    }

}
