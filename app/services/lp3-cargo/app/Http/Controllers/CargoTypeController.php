<?php

namespace Services\Lp3Cargo\App\Http\Controllers;

use Services\Lp3Cargo\App\Http\Requests\CargoType\IndexRequest;
use Services\Lp3Cargo\App\Http\Requests\CargoType\ShowRequest;
use Services\Lp3Cargo\App\Http\Requests\CargoType\StoreRequest;
use Services\Lp3Cargo\App\Http\Requests\CargoType\UpdateRequest;
use Services\Lp3Cargo\App\Http\Requests\CargoType\DestroyRequest;
use Services\Lp3Cargo\App\Http\Requests\CargoType\CsvDownloadRequest;

use Services\Lp3Cargo\App\Http\Resources\CargoType\IndexResourceCollection;
use Services\Lp3Cargo\App\Http\Resources\CargoType\ShowResource;
use Services\Lp3Cargo\App\Http\Resources\CargoType\StoreResource;
use Services\Lp3Cargo\App\Http\Resources\CargoType\UpdateResource;
use Services\Lp3Cargo\App\Http\Resources\CargoType\DestroyResource;
use Services\Lp3Cargo\App\Http\Resources\CargoType\CsvDownloadResource;

use Services\Lp3Cargo\App\Http\UseCases\CargoType\Index;
use Services\Lp3Cargo\App\Http\UseCases\CargoType\Show;
use Services\Lp3Cargo\App\Http\UseCases\CargoType\Store;
use Services\Lp3Cargo\App\Http\UseCases\CargoType\Update;
use Services\Lp3Cargo\App\Http\UseCases\CargoType\Destroy;
use Services\Lp3Cargo\App\Http\UseCases\CargoType\CsvDownload;

/**
 * 貨物種類コントローラー
 */
class CargoTypeController extends Controller
{
    /**
     * 貨物種類一覧の取得
     *
     * @param IndexRequest $request
     * @param Index $useCase
     * @return IndexResourceCollection
     * @apiResourceCollection Services\Lp3Cargo\App\Http\Resources\CargoType\IndexResourceCollection
     * @apiResourceModel Services\Lp3Cargo\App\Models\CargoType
     */
    public function index(IndexRequest $request, Index $useCase): IndexResourceCollection
    {
        return new IndexResourceCollection($useCase());
    }

    /**
     * 貨物種類の表示
     *
     * @param ShowRequest $request
     * @param Show $useCase
     * @param int $id
     * @return ShowResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\CargoType\ShowResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\CargoType
     */
    public function show(ShowRequest $request, Show $useCase, $id): ShowResource
    {
        return new ShowResource($useCase($id));
    }

    /**
     * 貨物種類の登録
     *
     * @param StoreRequest $request
     * @param Store $useCase
     * @return StoreResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\CargoType\StoreResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\CargoType
     */
    public function store(StoreRequest $request, Store $useCase): StoreResource
    {
        return new StoreResource($useCase());
    }

    /**
     * 貨物種類の更新
     *
     * @param UpdateRequest $request
     * @param Update $useCase
     * @param int $id
     * @return UpdateResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\CargoType\UpdateResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\CargoType
     */
    public function update(UpdateRequest $request, Update $useCase, $id): UpdateResource
    {
        return new UpdateResource($useCase($id,));
    }

    /**
     * 貨物種類の削除
     *
     * @param DestroyRequest $request
     * @param Destroy $useCase
     * @param Int $id
     * @return DestroyResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\CargoType\DestroyResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\CargoType
     */
    public function destroy(DestroyRequest $request, Destroy $useCase, $id): DestroyResource
    {
        return new DestroyResource($useCase($id));
    }

    /**
     * 貨物種類のCSVダウンロード
     *
     * @param CsvDownloadRequest $request
     * @param CsvDownload $useCase
     * @return CsvDownloadResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\CargoType\CsvDownloadResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\CargoType
     */
    public function csvDownload(CsvDownloadRequest $request, CsvDownload $useCase): CsvDownloadResource
    {
        return new CsvDownloadResource($useCase());
    }
}
