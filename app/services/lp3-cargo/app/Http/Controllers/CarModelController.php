<?php

namespace Services\Lp3Cargo\App\Http\Controllers;

use Services\Lp3Cargo\App\Http\Requests\CarModel\IndexRequest;
use Services\Lp3Cargo\App\Http\Requests\CarModel\ShowRequest;
use Services\Lp3Cargo\App\Http\Requests\CarModel\StoreRequest;
use Services\Lp3Cargo\App\Http\Requests\CarModel\UpdateRequest;
use Services\Lp3Cargo\App\Http\Requests\CarModel\DestroyRequest;
use Services\Lp3Cargo\App\Http\Requests\CarModel\CsvDownloadRequest;

use Services\Lp3Cargo\App\Http\Resources\CarModel\IndexResourceCollection;
use Services\Lp3Cargo\App\Http\Resources\CarModel\ShowResource;
use Services\Lp3Cargo\App\Http\Resources\CarModel\StoreResource;
use Services\Lp3Cargo\App\Http\Resources\CarModel\UpdateResource;
use Services\Lp3Cargo\App\Http\Resources\CarModel\DestroyResource;
use Services\Lp3Cargo\App\Http\Resources\CarModel\CsvDownloadResource;

use Services\Lp3Cargo\App\Http\UseCases\CarModel\Index;
use Services\Lp3Cargo\App\Http\UseCases\CarModel\Show;
use Services\Lp3Cargo\App\Http\UseCases\CarModel\Store;
use Services\Lp3Cargo\App\Http\UseCases\CarModel\Update;
use Services\Lp3Cargo\App\Http\UseCases\CarModel\Destroy;
use Services\Lp3Cargo\App\Http\UseCases\CarModel\CsvDownload;

/**
 * 車種コントローラー
 */
class CarModelController extends Controller
{
    /**
     * 車種一覧の取得
     *
     * @param IndexRequest $request
     * @param Index $useCase
     * @return IndexResourceCollection
     * @apiResourceCollection Services\Lp3Cargo\App\Http\Resources\CarModel\IndexResourceCollection
     * @apiResourceModel Services\Lp3Cargo\App\Models\CarModel with=carBrand
     */
    public function index(IndexRequest $request, Index $useCase): IndexResourceCollection
    {
        $name = $request->input('name');
        $nameEn = $request->input('nameEn');
        $carBrandId = $request->input('carBrandId');
        $carBrandName = $request->input('carBrandName');
        $carBrandNameEn = $request->input('carBrandNameEn');
        $order = $request->input('order');

        return new IndexResourceCollection($useCase($name, $nameEn, $carBrandId, $carBrandName, $carBrandNameEn, $order));
    }

    /**
     * 車種の表示
     *
     * @param ShowRequest $request
     * @param Show $useCase
     * @param int $id
     * @return ShowResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\CarModel\ShowResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\CarModel with=carBrand
     */
    public function show(ShowRequest $request, Show $useCase, $id): ShowResource
    {
        return new ShowResource($useCase($id));
    }

    /**
     * 車種の登録
     *
     * @param StoreRequest $request
     * @param Store $useCase
     * @return StoreResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\CarModel\StoreResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\CarModel with=carBrand
     */
    public function store(StoreRequest $request, Store $useCase): StoreResource
    {
        return new StoreResource($useCase($request->only(['name','nameEn','carBrandId'])));
    }

    /**
     * 車種の更新
     *
     * @param UpdateRequest $request
     * @param Update $useCase
     * @param int $id
     * @return UpdateResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\CarModel\UpdateResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\CarModel with=carBrand
     */
    public function update(UpdateRequest $request, Update $useCase, $id): UpdateResource
    {
        return new UpdateResource($useCase($id, $request->only(['name','nameEn','carBrandId'])));
    }

    /**
     * 車種の削除
     *
     * @param DestroyRequest $request
     * @param Destroy $useCase
     * @param Int $id
     * @return DestroyResource
     * @apiResource Services\Lp3Cargo\App\Http\Resources\CarModel\DestroyResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\CarModel with=carBrand
     */
    public function destroy(DestroyRequest $request, Destroy $useCase, $id): DestroyResource
    {
        return new DestroyResource($useCase($id));
    }

    /**
     * 複数車種のCSVのエクスポート
     *
     * @param CsvDownloadRequest $request
     * @param CsvDownload $useCase
     * @return CsvDownloadResource
     * @apiResourceModel Services\Lp3Cargo\App\Models\CarModel with=carBrand
     * @responseFile services/lp3-cargo/storage/responses/CarModel/car_model.csv
     */
    public function csvDownload(CsvDownloadRequest $request, CsvDownload $useCase): CsvDownloadResource
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $nameEn = $request->input('nameEn');
        $carBrandId = $request->input('carBrandId');
        $carBrandName = $request->input('carBrandName');
        $carBrandNameEn = $request->input('carBrandNameEn');
        $order = $request->input('order');

        return new CsvDownloadResource($useCase($id, $name, $nameEn, $carBrandId, $carBrandName, $carBrandNameEn, $order));
    }
}
