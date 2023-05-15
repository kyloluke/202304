<?php

namespace Services\Lp3Sales\App\Http\Controllers;

use Services\Lp3Sales\App\Http\Requests\AccountTitle\IndexRequest;
use Services\Lp3Sales\App\Http\Requests\AccountTitle\StoreRequest;
use Services\Lp3Sales\App\Http\Requests\AccountTitle\UpdateRequest;
use Services\Lp3Sales\App\Http\Requests\AccountTitle\CsvDownloadRequest;
use Services\Lp3Sales\App\Http\Requests\AccountTitle\OrdinaryRequest;

use Services\Lp3Sales\App\Http\Resources\AccountTitle\Resource;
use Services\Lp3Sales\App\Http\Resources\AccountTitle\ResourceCollection;
use Services\Lp3Sales\App\Http\Resources\AccountTitle\CsvDownloadResource;
use Services\Lp3Sales\App\Http\Resources\AccountTitle\OrdinaryResource;

use Services\Lp3Sales\App\Http\UseCases\AccountTitle\Index;
use Services\Lp3Sales\App\Http\UseCases\AccountTitle\Show;
use Services\Lp3Sales\App\Http\UseCases\AccountTitle\Store;
use Services\Lp3Sales\App\Http\UseCases\AccountTitle\Update;
use Services\Lp3Sales\App\Http\UseCases\AccountTitle\Destroy;
use Services\Lp3Sales\App\Http\UseCases\AccountTitle\CsvDownload;
use Services\Lp3Sales\App\Http\UseCases\AccountTitle\Ordinary;

/**
 * 勘定科目コントローラー
 */
class AccountTitleController extends Controller
{
    /**
     * 勘定科目の一覧の取得
     *
     * @param IndexRequest $request
     * @param Index $useCase
     * @return ResourceCollection
     * @apiResourceCollection Services\Lp3Sales\App\Http\Resources\AccountTitle\ResourceCollection
     * @apiResourceModel Services\Lp3Sales\App\Models\AccountTitle
     */
    public function index(IndexRequest $request, Index $useCase): ResourceCollection
    {
        return new ResourceCollection($useCase($request));
    }

    /**
     * 勘定科目の表示
     *
     * @param Show $useCase
     * @param int $id
     * @return Resource
     * @apiResourceCollection Services\Lp3Sales\App\Http\Resources\AccountTitle\Resource
     * @apiResourceModel Services\Lp3Sales\App\Models\AccountTitle
     */
    public function show(Show $useCase, $id): Resource
    {
        return new Resource($useCase($id));
    }

    /**
     * 勘定科目の登録
     *
     * @param StoreRequest $request
     * @param Store $useCase
     * @return Resource
     * @apiResourceCollection Services\Lp3Sales\App\Http\Resources\AccountTitle\Resource
     * @apiResourceModel Services\Lp3Sales\App\Models\AccountTitle
     */
    public function store(StoreRequest $request, Store $useCase): Resource
    {
        return new Resource($useCase($request->only(['name','name_en','code','available','ordinary'])));
    }

    /**
     * 勘定科目の更新
     *
     * @param UpdateRequest $request
     * @param Update $useCase
     * @param int $id
     * @return Resource
     * @apiResourceCollection Services\Lp3Sales\App\Http\Resources\AccountTitle\Resource
     * @apiResourceModel Services\Lp3Sales\App\Models\AccountTitle
     */
    public function update(UpdateRequest $request, Update $useCase, $id): Resource
    {
        return new Resource($useCase($id, $request->only(['name','name_en','code','available','ordinary'])));
    }

    /**
     * 勘定科目の削除
     *
     * @param Destroy $useCase
     * @param Int $id
     * @return ResourceCollection
     * @apiResourceCollection Services\Lp3Sales\App\Http\Resources\AccountTitle\ResourceCollection
     * @apiResourceModel Services\Lp3Sales\App\Models\AccountTitle
     */
    public function destroy(Destroy $useCase, $id): ResourceCollection
    {
        return new ResourceCollection($useCase($id));
    }

    /**
     * 勘定科目のCSVダウンロード
     *
     * @param CsvDownloadRequest $request
     * @param CsvDownload $useCase
     * @return CsvDownloadResource
     * @apiResource Services\Lp3Sales\App\Http\Resources\AccountTitle\CsvDownloadResource
     * @apiResourceModel Services\Lp3Sales\App\Models\AccountTitle
     */
    public function csvDownload(CsvDownloadRequest $request, CsvDownload $useCase): CsvDownloadResource
    {
        return new CsvDownloadResource($useCase());
    }

    /**
     * 複数勘定科目の順序の更新
     *
     * @param OrdinaryRequest $request
     * @param Ordinary $useCase
     * @return OrdinaryResource
     * @apiResource Services\Lp3Sales\App\Http\Resources\AccountTitle\OrdinaryResource
     * @apiResourceModel Services\Lp3Sales\App\Models\AccountTitle
     */
    public function ordinary(OrdinaryRequest $request, Ordinary $useCase): OrdinaryResource
    {
        return new OrdinaryResource($useCase());
    }
}
