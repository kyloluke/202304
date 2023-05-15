<?php

namespace Services\Lp3Core\App\Http\Controllers;

use Services\Lp3Core\App\Http\Requests\InspectionType\CsvDownloadRequest;
use Services\Lp3Core\App\Http\Requests\InspectionType\IndexRequest;
use Services\Lp3Core\App\Http\Requests\InspectionType\StoreRequest;
use Services\Lp3Core\App\Http\Requests\InspectionType\UpdateRequest;
use Services\Lp3Core\App\Http\Requests\InspectionType\DestroyRequest;
use Services\Lp3Core\App\Http\Requests\InspectionType\ShowRequest;
use Services\Lp3Core\App\Http\Resources\InspectionType\CsvDownloadResource;
use Services\Lp3Core\App\Http\Resources\InspectionType\IndexResourceCollection;
use Services\Lp3Core\App\Http\Resources\InspectionType\StoreResource;
use Services\Lp3Core\App\Http\Resources\InspectionType\ShowResource;
use Services\Lp3Core\App\Http\Resources\InspectionType\UpdateResource;
use Services\Lp3Core\App\Http\Resources\InspectionType\DestroyResource;
use Services\Lp3Core\App\Http\UseCases\InspectionType\CsvDownload;
use Services\Lp3Core\App\Http\UseCases\InspectionType\Index;
use Services\Lp3Core\App\Http\UseCases\InspectionType\Update;
use Services\Lp3Core\App\Http\UseCases\InspectionType\Store;
use Services\Lp3Core\App\Http\UseCases\InspectionType\Show;
use Services\Lp3Core\App\Http\UseCases\InspectionType\Destroy;

/**
 * 検査種別コントローラー
 */
class InspectionTypeController extends Controller
{
    /**
     * 検査種別の一覧の取得
     *
     * @param IndexRequest $request
     * @param Index $useCase
     * @return IndexResourceCollection
     * @apiResourceCollection Services\Lp3Core\App\Http\Resources\InspectionType\IndexResourceCollection
     * @apiResourceModel Services\Lp3Core\App\Models\InspectionType
     */
    public function index(IndexRequest $request, Index $useCase): IndexResourceCollection
    {
        return new IndexResourceCollection($useCase());
    }

    /**
     * 検査種別の新規作成
     *
     * @param StoreRequest $request
     * @param Store $useCase
     * @return StoreResource
     * @apiResource Services\Lp3Core\App\Http\Resources\InspectionType\StoreResource
     * @apiResourceModel Services\Lp3Core\App\Models\InspectionType
     */
    public function store(StoreRequest $request, Store $useCase): StoreResource
    {
        return new StoreResource($useCase($request->only(['name'])));
    }

    /**
     * 検査種別の詳細
     *
     * @param ShowRequest $request
     * @param Show $useCase
     * @return ShowResource
     * @apiResource Services\Lp3Core\App\Http\Resources\InspectionType\ShowResource
     * @apiResourceModel Services\Lp3Core\App\Models\InspectionType
     */
    public function show(ShowRequest $request, Show $useCase, $id): ShowResource
    {
        return new ShowResource($useCase($id));
    }

    /**
     * 検査種別の更新
     *
     * @param UpdateRequest $request
     * @param Update $useCase
     * @return UpdateResource
     * @apiResource Services\Lp3Core\App\Http\Resources\InspectionType\UpdateResource
     * @apiResourceModel Services\Lp3Core\App\Models\InspectionType
     */
    public function update(UpdateRequest $request, Update $useCase, $id): UpdateResource
    {
        return new UpdateResource($useCase($id, $request->only('name')));
    }

    /**
     * 検査種別の削除
     *
     * @param DestroyRequest $request
     * @param Destroy $useCase
     * @return DestroyResource
     * @apiResource Services\Lp3Core\App\Http\Resources\InspectionType\DestroyResource
     * @apiResourceModel Services\Lp3Core\App\Models\InspectionType
     */
    public function destroy(DestroyRequest $request, Destroy $useCase, $id): DestroyResource
    {
        return new DestroyResource($useCase($id));
    }

    /**
     * 検査種別のCSVダウンロード
     *
     * @param CsvDownloadRequest $request
     * @param CsvDownload $useCase
     * @return CsvDownloadResource
     * @apiResourceModel Services\Lp3Core\App\Models\InspectionType
     * @responseFile services/lp3-core/storage/responses/InspectionType/inspection_type.csv
     */
    public function csvDownload(CsvDownloadRequest $request, CsvDownload $useCase): CsvDownloadResource
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $order = $request->input('order');

        return new CsvDownloadResource($useCase($id, $name, $order));
    }

}
