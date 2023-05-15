<?php

namespace Services\Lp3Core\App\Http\Controllers;

use Services\Lp3Core\App\Http\Requests\Office\IndexRequest;
use Services\Lp3Core\App\Http\Requests\Office\ShowRequest;
use Services\Lp3Core\App\Http\Requests\Office\StoreRequest;
use Services\Lp3Core\App\Http\Requests\Office\UpdateRequest;
use Services\Lp3Core\App\Http\Requests\Office\DestroyRequest;
use Services\Lp3Core\App\Http\Requests\Office\CsvDownloadRequest;

use Services\Lp3Core\App\Http\Resources\Office\IndexResourceCollection;
use Services\Lp3Core\App\Http\Resources\Office\ShowResource;
use Services\Lp3Core\App\Http\Resources\Office\StoreResource;
use Services\Lp3Core\App\Http\Resources\Office\UpdateResource;
use Services\Lp3Core\App\Http\Resources\Office\DestroyResource;
use Services\Lp3Core\App\Http\Resources\Office\CsvDownloadResource;

use Services\Lp3Core\App\Http\UseCases\Office\Index;
use Services\Lp3Core\App\Http\UseCases\Office\Show;
use Services\Lp3Core\App\Http\UseCases\Office\Store;
use Services\Lp3Core\App\Http\UseCases\Office\Update;
use Services\Lp3Core\App\Http\UseCases\Office\Destroy;
use Services\Lp3Core\App\Http\UseCases\Office\CsvDownload;

/**
 * 事業所コントローラー
 */
class OfficeController extends Controller
{
    /**
     * 事業所一覧の取得
     *
     * @param IndexRequest $request
     * @param Index $useCase
     * @return IndexResourceCollection
     * @apiResourceCollection Services\Lp3Core\App\Http\Resources\Office\IndexResourceCollection
     * @apiResourceModel Services\Lp3Core\App\Models\Office
     */
    public function index(IndexRequest $request, Index $useCase): IndexResourceCollection
    {
        return new IndexResourceCollection($useCase());
    }

    /**
     * 事業所の表示
     *
     * @param ShowRequest $request
     * @param Show $useCase
     * @param int $id
     * @return ShowResource
     * @apiResource Services\Lp3Core\App\Http\Resources\Office\ShowResource
     * @apiResourceModel Services\Lp3Core\App\Models\Office
     */
    public function show(ShowRequest $request, Show $useCase, $id): ShowResource
    {
        return new ShowResource($useCase($id));
    }

    /**
     * 事業所の登録
     *
     * @param StoreRequest $request
     * @param Store $useCase
     * @return StoreResource
     * @apiResource Services\Lp3Core\App\Http\Resources\Office\StoreResource
     * @apiResourceModel Services\Lp3Core\App\Models\Office
     */
    public function store(StoreRequest $request, Store $useCase): StoreResource
    {
        return new StoreResource($useCase());
    }

    /**
     * 事業所の更新
     *
     * @param UpdateRequest $request
     * @param Update $useCase
     * @param int $id
     * @return UpdateResource
     * @apiResource Services\Lp3Core\App\Http\Resources\Office\UpdateResource
     * @apiResourceModel Services\Lp3Core\App\Models\Office
     */
    public function update(UpdateRequest $request, Update $useCase, $id): UpdateResource
    {
        return new UpdateResource($useCase($id,));
    }

    /**
     * 事業所の削除
     *
     * @param DestroyRequest $request
     * @param Destroy $useCase
     * @param Int $id
     * @return DestroyResource
     * @apiResource Services\Lp3Core\App\Http\Resources\Office\DestroyResource
     * @apiResourceModel Services\Lp3Core\App\Models\Office
     */
    public function destroy(DestroyRequest $request, Destroy $useCase, $id): DestroyResource
    {
        return new DestroyResource($useCase($id));
    }

    /**
     * 事業所のCSVダウンロード
     *
     * @param CsvDownloadRequest $request
     * @param CsvDownload $useCase
     * @return CsvDownloadResource
     * @apiResource Services\Lp3Core\App\Http\Resources\Office\CsvDownloadResource
     * @apiResourceModel Services\Lp3Core\App\Models\Office
     */
    public function csvDownload(CsvDownloadRequest $request, CsvDownload $useCase): CsvDownloadResource
    {
        return new CsvDownloadResource($useCase());
    }
}
