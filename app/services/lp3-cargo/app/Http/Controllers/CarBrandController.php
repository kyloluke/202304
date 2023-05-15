<?php

namespace Services\Lp3Cargo\App\Http\Controllers;

use Services\Lp3Cargo\App\Http\Requests\CarBrand\IndexRequest;
use Services\Lp3Cargo\App\Http\Requests\CarBrand\ShowRequest;
use Services\Lp3Cargo\App\Http\Requests\CarBrand\StoreRequest;
use Services\Lp3Cargo\App\Http\Requests\CarBrand\UpdateRequest;
use Services\Lp3Cargo\App\Http\Requests\CarBrand\DestroyRequest;
use Services\Lp3Cargo\App\Http\Requests\CarBrand\CsvDownloadRequest;

use Services\Lp3Cargo\App\Http\Resources\CarBrand\IndexResourceCollection;
use Services\Lp3Cargo\App\Http\Resources\CarBrand\ShowResource;
use Services\Lp3Cargo\App\Http\Resources\CarBrand\StoreResource;
use Services\Lp3Cargo\App\Http\Resources\CarBrand\UpdateResource;
use Services\Lp3Cargo\App\Http\Resources\CarBrand\DestroyResource;
use Services\Lp3Cargo\App\Http\Resources\CarBrand\CsvDownloadResource;

use Services\Lp3Cargo\App\Http\UseCases\CarBrand\Index;
use Services\Lp3Cargo\App\Http\UseCases\CarBrand\Show;
use Services\Lp3Cargo\App\Http\UseCases\CarBrand\Store;
use Services\Lp3Cargo\App\Http\UseCases\CarBrand\Update;
use Services\Lp3Cargo\App\Http\UseCases\CarBrand\Destroy;
use Services\Lp3Cargo\App\Http\UseCases\CarBrand\CsvDownload;

/**
 * 自動車ブランドコントローラー
 */
class CarBrandController extends Controller
{
    /**
     * 自動車ブランド一覧の取得
     *
     * @param IndexRequest $request
     * @param Index $useCase
     * @return IndexResourceCollection
     * @apiResourceCollection Services\Lp3Cargo\App\Http\Resources\CarBrand\IndexResourceCollection
     * @apiResourceModel Services\Lp3Cargo\App\Models\CarBrand
     */
    public function index(IndexRequest $request, Index $useCase): IndexResourceCollection
    {
        $name = $request->input('name');
        $nameEn = $request->input('nameEn');
        $order = $request->input('order');

        return new IndexResourceCollection($useCase($name, $nameEn, $order));
    }

    /**
     * 自動車ブランドの表示
     *
     * @param ShowRequest $request
     * @param Show $useCase
     * @param int $id
     * @return ShowResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\CarBrand\ShowResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\CarBrand
     */
    public function show(ShowRequest $request, Show $useCase, $id): ShowResource
    {
        return new ShowResource($useCase($id));
    }

    /**
     * 自動車ブランドの登録
     *
     * @param StoreRequest $request
     * @param Store $useCase
     * @return StoreResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\CarBrand\StoreResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\CarBrand
     */
    public function store(StoreRequest $request, Store $useCase): StoreResource
    {
        return new StoreResource($useCase($request->only(['name','nameEn'])));
    }

    /**
     * 自動車ブランドの更新
     *
     * @param UpdateRequest $request
     * @param Update $useCase
     * @param int $id
     * @return UpdateResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\CarBrand\UpdateResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\CarBrand
     */
    public function update(UpdateRequest $request, Update $useCase, $id): UpdateResource
    {
        return new UpdateResource($useCase($id, $request->only(['name','nameEn'])));
    }

    /**
     * 自動車ブランドの削除
     *
     * @param DestroyRequest $request
     * @param Destroy $useCase
     * @param Int $id
     * @return DestroyResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\CarBrand\DestroyResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\CarBrand
     */
    public function destroy(DestroyRequest $request, Destroy $useCase, $id): DestroyResource
    {
        return new DestroyResource($useCase($id));
    }

    /**
     * 自動車ブランドのCSVダウンロード
     *
     * @param CsvDownloadRequest $request
     * @param CsvDownload $useCase
     * @return CsvDownloadResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\CarBrand
     * @responseFile services/lp3-cargo/storage/responses/CarBrand/car_brand.csv
     */
    public function csvDownload(CsvDownloadRequest $request, CsvDownload $useCase): CsvDownloadResource
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $nameEn = $request->input('nameEn');
        $order = $request->input('order');

        return new CsvDownloadResource($useCase($id, $name, $nameEn, $order));
    }
}
