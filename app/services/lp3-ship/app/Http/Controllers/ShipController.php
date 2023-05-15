<?php

namespace Services\Lp3Ship\App\Http\Controllers;

use Services\Lp3Ship\App\Http\Requests\Ship\DestroyRequest;
use Services\Lp3Ship\App\Http\Requests\Ship\IndexRequest;
use Services\Lp3Ship\App\Http\Requests\Ship\ShowRequest;
use Services\Lp3Ship\App\Http\Requests\Ship\StoreRequest;
use Services\Lp3Ship\App\Http\Requests\Ship\UpdateRequest;
use Services\Lp3Ship\App\Http\Requests\Ship\CsvDownloadRequest;

use Services\Lp3Ship\App\Http\Resources\Ship\DestroyResource;
use Services\Lp3Ship\App\Http\Resources\Ship\IndexResourceCollection;
use Services\Lp3Ship\App\Http\Resources\Ship\ShowResource;
use Services\Lp3Ship\App\Http\Resources\Ship\StoreResource;
use Services\Lp3Ship\App\Http\Resources\Ship\UpdateResource;
use Services\Lp3Ship\App\Http\Resources\Ship\CsvDownloadResource;

use Services\Lp3Ship\App\Http\UseCases\Ship\Destroy;
use Services\Lp3Ship\App\Http\UseCases\Ship\Index;
use Services\Lp3Ship\App\Http\UseCases\Ship\Show;
use Services\Lp3Ship\App\Http\UseCases\Ship\Store;
use Services\Lp3Ship\App\Http\UseCases\Ship\Update;
use Services\Lp3Ship\App\Http\UseCases\Ship\CsvDownload;

/**
 * 本船コントローラー
 */
class ShipController extends Controller
{
    /**
     * 本船の一覧の取得
     *
     * @param Index $useCase
     * @return IndexResourceCollection
     * @apiResourceCollection Services\Lp3Ship\App\Http\Resources\Ship\IndexResourceCollection
     * @apiResourceModel Services\Lp3Ship\App\Models\Ship
     */
    public function index(IndexRequest $request, Index $useCase): IndexResourceCollection
    {
        $requestData = [
            'name' => $request->input('name'),
            'type' => $request->input('type'),
        ];
        return new IndexResourceCollection($useCase($requestData));
    }

    /**
     * 本船の詳細情報の取得
     *
     * @param ShowRequest $request
     * @param Show $useCase
     * @return ShowResource
     * @apiResource Services\Lp3Ship\App\Http\Resources\Ship\ShowResource
     * @apiResourceModel Services\Lp3Ship\App\Models\Ship
     */
    public function show(ShowRequest $request, Show $useCase, $id): ShowResource
    {
        return new ShowResource($useCase($id));
    }

    /**
     * 本船の作成
     *
     * @param StoreRequest $request
     * @param Store $useCase
     * @return StoreResource
     * @apiResource Services\Lp3Ship\App\Http\Resources\Ship\StoreResource
     * @apiResourceModel Services\Lp3Ship\App\Models\Ship
     */
    public function store(StoreRequest $request, Store $useCase): StoreResource
    {
        return new StoreResource($useCase($request->only(['name', 'type'])));
    }

    /**
     * 本船の更新
     *
     * @param UpdateRequest $request
     * @param Update $useCase
     * @return UpdateResource
     * @apiResource Services\Lp3Ship\App\Http\Resources\Ship\UpdateResource
     * @apiResourceModel Services\Lp3Ship\App\Models\Ship
     */
    public function update(UpdateRequest $request, Update $useCase, $id): UpdateResource
    {
        return new UpdateResource($useCase($request->only(['name', 'type']), $id));
    }

    /**
     * 本船の削除
     *
     * @param DestroyRequest $request
     * @param Destroy $useCase
     * @return DestroyResource
     * @apiResource Services\Lp3Ship\App\Http\Resources\Ship\DestroyResource
     * @apiResourceModel Services\Lp3Ship\App\Models\Ship
     */
    public function destroy(DestroyRequest $request, Destroy $useCase, $id): DestroyResource
    {
        return new DestroyResource($useCase($id));
    }

    /**
     * 本船のCSVダウンロード
     *
     * @param CsvDownloadRequest $request
     * @param CsvDownload $useCase
     * @return CsvDownloadResource
     * @apiResource Services\Lp3Ship\App\Http\Resources\Ship\CsvDownloadResource
     * @apiResourceModel Services\Lp3Ship\App\Models\Ship
     */
    public function csvDownload(CsvDownloadRequest $request, CsvDownload $useCase): CsvDownloadResource
    {
        return new CsvDownloadResource($useCase());
    }
}
