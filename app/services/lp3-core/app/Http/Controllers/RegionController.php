<?php

namespace Services\Lp3Core\App\Http\Controllers;

use Services\Lp3Core\App\Http\Requests\Region\IndexRequest;
use Services\Lp3Core\App\Http\Requests\Region\StoreRequest;
use Services\Lp3Core\App\Http\Requests\Region\UpdateRequest;
use Services\Lp3Core\App\Http\Requests\Region\DestroyRequest;
use Services\Lp3Core\App\Http\Requests\Region\ShowRequest;
use Services\Lp3Core\App\Http\Resources\Region\CsvDownloadResource;
use Services\Lp3Core\App\Http\Resources\Region\IndexResourceCollection;
use Services\Lp3Core\App\Http\Resources\Region\StoreResource;
use Services\Lp3Core\App\Http\Resources\Region\ShowResource;
use Services\Lp3Core\App\Http\Resources\Region\UpdateResource;
use Services\Lp3Core\App\Http\Resources\Region\DestroyResource;
use Services\Lp3Core\App\Http\UseCases\Region\CsvDownload;
use Services\Lp3Core\App\Http\UseCases\Region\Index;
use Services\Lp3Core\App\Http\UseCases\Region\Update;
use Services\Lp3Core\App\Http\UseCases\Region\Store;
use Services\Lp3Core\App\Http\UseCases\Region\Show;
use Services\Lp3Core\App\Http\UseCases\Region\Destroy;
use Services\Lp3Core\App\Http\Requests\Region\CsvDownloadRequest;

/**
 * 地域コントローラー
 */
class RegionController extends Controller
{
    /**
     * 地域の一覧の取得
     *
     * @param IndexRequest $request
     * @param Index $useCase
     * @return IndexResourceCollection
     * @apiResourceCollection Services\Lp3Core\App\Http\Resources\Region\IndexResourceCollection
     * @apiResourceModel Services\Lp3Core\App\Models\Region
     */
    public function index(IndexRequest $request, Index $useCase): IndexResourceCollection
    {
        return new IndexResourceCollection($useCase());
    }

    /**
     * 地域の新規作成
     *
     * @param StoreRequest $request
     * @param Store $useCase
     * @return StoreResource
     * @apiResource Services\Lp3Core\App\Http\Resources\Region\StoreResource
     * @apiResourceModel Services\Lp3Core\App\Models\Region
     */
    public function store(StoreRequest $request, Store $useCase): StoreResource
    {
        return new StoreResource($useCase($request->only(['name'])));
    }

    /**
     * 地域の詳細
     *
     * @param ShowRequest $request
     * @param Show $useCase
     * @return ShowResource
     * @apiResource Services\Lp3Core\App\Http\Resources\Region\ShowResource
     * @apiResourceModel Services\Lp3Core\App\Models\Region
     */
    public function show(ShowRequest $request, Show $useCase, $id): ShowResource
    {
        return new ShowResource($useCase($id));
    }

    /**
     * 地域の更新
     *
     * @param UpdateRequest $request
     * @param Update $useCase
     * @return UpdateResource
     * @apiResource Services\Lp3Core\App\Http\Resources\Region\UpdateResource
     * @apiResourceModel Services\Lp3Core\App\Models\Region
     */
    public function update(UpdateRequest $request, Update $useCase, $id): UpdateResource
    {
        return new UpdateResource($useCase($id, $request->only(['name'])));
    }


    /**
     * 地域の削除
     *
     * @param DestroyRequest $request
     * @param Destroy $useCase
     * @return DestroyResource
     * @apiResource Services\Lp3Core\App\Http\Resources\Region\DestroyResource
     * @apiResourceModel Services\Lp3Core\App\Models\Region
     */
    public function destroy(DestroyRequest $request, Destroy $useCase, $id): DestroyResource
    {
        return new DestroyResource($useCase($id));
    }
    /**
     * 地域のCSVダウンロード
     *
     * @param CsvDownloadRequest $request
     * @param CsvDownload $useCase
     * @return CsvDownloadResource
     * @apiResource Services\Lp3Core\App\Http\Resources\Region\CsvDownloadResource
     * @apiResourceModel Services\Lp3Core\App\Models\Region
     */
    public function csvDownload(CsvDownloadRequest $request, CsvDownload $useCase): CsvDownloadResource
    {
        return new CsvDownloadResource($useCase());
    }

}
