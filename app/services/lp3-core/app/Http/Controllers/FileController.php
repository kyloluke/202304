<?php

namespace Services\Lp3Core\App\Http\Controllers;

use Services\Lp3Core\App\Http\Requests\File\ShowRequest;
use Services\Lp3Core\App\Http\Requests\File\StoreRequest;

use Services\Lp3Core\App\Http\Resources\File\ShowResource;
use Services\Lp3Core\App\Http\Resources\File\StoreResource;

use Services\Lp3Core\App\Http\UseCases\File\Show;
use Services\Lp3Core\App\Http\UseCases\File\Store;

/**
 * ファイルコントローラー
 */
class FileController extends Controller
{
    /**
     * ファイルの取得
     *
     * @param ShowRequest $request
     * @param Show $useCase
     * @param int $id
     * @return ShowResource
     * @apiResource Services\Lp3Core\App\Http\Resources\File\ShowResource
     * @apiResourceModel Services\Lp3Core\App\Models\Model
     */
    public function show(ShowRequest $request, Show $useCase, $id): ShowResource
    {
        return new ShowResource($useCase($id));
    }

    /**
     * ファイルのアップロード
     *
     * @param StoreRequest $request
     * @param Store $useCase
     * @return StoreResource
     * @apiResource Services\Lp3Core\App\Http\Resources\File\StoreResource
     * @apiResourceModel Services\Lp3Core\App\Models\Model
     */
    public function store(StoreRequest $request, Store $useCase): StoreResource
    {
        return new StoreResource($useCase());
    }
}
