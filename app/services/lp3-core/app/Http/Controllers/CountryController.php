<?php

namespace Services\Lp3Core\App\Http\Controllers;

use Services\Lp3Core\App\Http\Requests\Country\IndexRequest;
use Services\Lp3Core\App\Http\Requests\Country\StoreRequest;
use Services\Lp3Core\App\Http\Requests\Country\UpdateRequest;
use Services\Lp3Core\App\Http\Requests\Country\DestroyRequest;
use Services\Lp3Core\App\Http\Requests\Country\ShowRequest;
use Services\Lp3Core\App\Http\Requests\Country\CsvDownloadRequest;
use Services\Lp3Core\App\Http\Resources\Country\IndexResourceCollection;
use Services\Lp3Core\App\Http\Resources\Country\StoreResource;
use Services\Lp3Core\App\Http\Resources\Country\ShowResource;
use Services\Lp3Core\App\Http\Resources\Country\UpdateResource;
use Services\Lp3Core\App\Http\Resources\Country\DestroyResource;
use Services\Lp3Core\App\Http\Resources\Country\CsvDownloadResource;
use Services\Lp3Core\App\Http\UseCases\Country\Index;
use Services\Lp3Core\App\Http\UseCases\Country\Update;
use Services\Lp3Core\App\Http\UseCases\Country\Store;
use Services\Lp3Core\App\Http\UseCases\Country\Show;
use Services\Lp3Core\App\Http\UseCases\Country\Destroy;
use Services\Lp3Core\App\Http\UseCases\Country\CsvDownload;

/**
 * 国コントローラー
 */
class CountryController extends Controller
{
    /**
     * 国の一覧の取得
     *
     * @param IndexRequest $request
     * @param Index $useCase
     * @return IndexResourceCollection
     * @apiResourceCollection Services\Lp3Core\App\Http\Resources\Country\IndexResourceCollection
     * @apiResourceModel Services\Lp3Core\App\Models\Country
     */
    public function index(IndexRequest $request, Index $useCase): IndexResourceCollection
    {
        return new IndexResourceCollection($useCase());
    }

    /**
     * 国の新規作成
     *
     * @param StoreRequest $request
     * @param Store $useCase
     * @return StoreResource
     * @apiResource Services\Lp3Core\App\Http\Resources\Country\StoreResource
     * @apiResourceModel Services\Lp3Core\App\Models\Country
     */
    public function store(StoreRequest $request, Store $useCase): StoreResource
    {
        return new StoreResource($useCase($request->only(['name', 'regionId', 'requiredInspections'])));
    }

    /**
     * 国の詳細
     *
     * @param ShowRequest $request
     * @param Show $useCase
     * @return ShowResource
     * @apiResource Services\Lp3Core\App\Http\Resources\Country\ShowResource
     * @apiResourceModel Services\Lp3Core\App\Models\Country
     */
    public function show(ShowRequest $request, Show $useCase, $id): ShowResource
    {
        return new ShowResource($useCase($id));
    }

    /**
     * 国の更新
     *
     * @param UpdateRequest $request
     * @param Update $useCase
     * @return UpdateResource
     * @apiResource Services\Lp3Core\App\Http\Resources\Country\UpdateResource
     * @apiResourceModel Services\Lp3Core\App\Models\Country
     */
    public function update(UpdateRequest $request, Update $useCase, $id): UpdateResource
    {
        return new UpdateResource($useCase($id, $request->only(['name', 'regionId', 'requiredInspections'])));
    }

    /**
     * 国の削除
     *
     * @param DestroyRequest $request
     * @param Destroy $useCase
     * @return DestroyResource
     * @apiResource Services\Lp3Core\App\Http\Resources\Country\DestroyResource
     * @apiResourceModel Services\Lp3Core\App\Models\Country
     */
    public function destroy(DestroyRequest $request, Destroy $useCase, $id): DestroyResource
    {
        return new DestroyResource($useCase($id));
    }

    /**
     * 国のCSVダウンロード
     *
     * @param CsvDownloadRequest $request
     * @param CsvDownload $useCase
     * @return CsvDownloadResource
     * @apiResourceModel Services\Lp3Core\App\Models\Country with=region
     * @responseFile services/lp3-core/storage/responses/Country/country.csv
     */
    public function csvDownload(CsvDownloadRequest $request, CsvDownload $useCase): CsvDownloadResource
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $regionId = $request->input('regionId');
        $regionName = $request->input('regionName');
        $requiredInspectionId = $request->input('requiredInspectionId');
        $requiredInspectionName = $request->input('requiredInspectionName');
        $order = $request->input('order');

        return new CsvDownloadResource($useCase($id, $name, $regionId, $regionName, $requiredInspectionId, $requiredInspectionName, $order));
    }

}
