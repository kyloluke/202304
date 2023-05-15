<?php

namespace Services\Lp3Ship\App\Http\Controllers;

use Services\Lp3Ship\App\Http\Requests\ShipCompany\CsvDownloadRequest;
use Services\Lp3Ship\App\Http\Resources\ShipCompany\CsvDownloadResource;
use Services\Lp3Ship\App\Http\UseCases\ShipCompany\CsvDownload;
use Services\Lp3Ship\App\Http\Requests\ShipCompany\IndexRequest;
use Services\Lp3Ship\App\Http\Requests\ShipCompany\StoreRequest;
use Services\Lp3Ship\App\Http\Requests\ShipCompany\UpdateRequest;
use Services\Lp3Ship\App\Http\Requests\ShipCompany\DestroyRequest;
use Services\Lp3Ship\App\Http\Requests\ShipCompany\ShowRequest;
use Services\Lp3Ship\App\Http\Resources\ShipCompany\IndexResourceCollection;
use Services\Lp3Ship\App\Http\Resources\ShipCompany\StoreResource;
use Services\Lp3Ship\App\Http\Resources\ShipCompany\ShowResource;
use Services\Lp3Ship\App\Http\Resources\ShipCompany\UpdateResource;
use Services\Lp3Ship\App\Http\Resources\ShipCompany\DestroyResource;
use Services\Lp3Ship\App\Http\UseCases\ShipCompany\Index;
use Services\Lp3Ship\App\Http\UseCases\ShipCompany\Update;
use Services\Lp3Ship\App\Http\UseCases\ShipCompany\Store;
use Services\Lp3Ship\App\Http\UseCases\ShipCompany\Show;
use Services\Lp3Ship\App\Http\UseCases\ShipCompany\Destroy;

/**
 * 船会社コントローラー
 */
class ShipCompanyController extends Controller
{
    /**
     * 船会社の一覧の取得
     *
     * @param IndexRequest $request
     * @param Index $useCase
     * @return IndexResourceCollection
     * @apiResourceCollection Services\Lp3Ship\App\Http\Resources\ShipCompany\IndexResourceCollection
     * @apiResourceModel Services\Lp3Ship\App\Models\ShipCompany
     */
    public function index(IndexRequest $request, Index $useCase): IndexResourceCollection
    {
        return new IndexResourceCollection($useCase($request->all()));
    }

    /**
     * 船会社の新規作成
     *
     * @param StoreRequest $request
     * @param Store $useCase
     * @return StoreResource
     * @apiResource Services\Lp3Ship\App\Http\Resources\ShipCompany\StoreResource
     * @apiResourceModel Services\Lp3Ship\App\Models\ShipCompany
     * @response 201
     */
    public function store(StoreRequest $request, Store $useCase): StoreResource
    {
        return new StoreResource($useCase($request->all()));
    }

    /**
     * 船会社の詳細
     *
     * @param ShowRequest $request
     * @param Show $useCase
     * @return ShowResource
     * @apiResource Services\Lp3Ship\App\Http\Resources\ShipCompany\ShowResource
     * @apiResourceModel Services\Lp3Ship\App\Models\ShipCompany
     */
    public function show(ShowRequest $request, Show $useCase, $id): ShowResource
    {
        return new ShowResource($useCase($id));
    }

    /**
     * 船会社の更新
     *
     * @param UpdateRequest $request
     * @param Update $useCase
     * @return UpdateResource
     * @apiResource Services\Lp3Ship\App\Http\Resources\ShipCompany\UpdateResource
     * @apiResourceModel Services\Lp3Ship\App\Models\ShipCompany
     */
    public function update(UpdateRequest $request, Update $useCase, $id): UpdateResource
    {
        return new UpdateResource($useCase($id, $request->all()));
    }

    /**
     * 船会社の削除
     *
     * @param DestroyRequest $request
     * @param Destroy $useCase
     * @return DestroyResource
     * @apiResource Services\Lp3Ship\App\Http\Resources\ShipCompany\DestroyResource
     * @apiResourceModel Services\Lp3Ship\App\Models\ShipCompany
     */
    public function destroy(DestroyRequest $request, Destroy $useCase, $id): DestroyResource
    {
        return new DestroyResource($useCase($id));
    }

    /**
     * 船会社のCSVダウンロード
     *
     * @param CsvDownloadRequest $request
     * @param CsvDownload $useCase
     * @return CsvDownloadResource
     * @apiResource Services\Lp3Ship\App\Http\Resources\ShipCompany\CsvDownloadResource
     * @apiResourceModel Services\Lp3Ship\App\Models\ShipCompany
     */
    public function csvDownload(CsvDownloadRequest $request, CsvDownload $useCase): CsvDownloadResource
    {
        return new CsvDownloadResource($useCase());
    }
}
