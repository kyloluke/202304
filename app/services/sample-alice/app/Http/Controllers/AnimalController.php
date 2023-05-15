<?php

namespace Services\SampleAlice\App\Http\Controllers;

use Services\SampleAlice\App\Http\Requests\Animal\IndexRequest;
use Services\SampleAlice\App\Http\Requests\Animal\ShowRequest;
use Services\SampleAlice\App\Http\Resources\Animal\IndexResourceCollection;
use Services\SampleAlice\App\Http\Resources\Animal\ShowResource;
use Services\SampleAlice\App\Http\UseCases\Animal\Index;
use Services\SampleAlice\App\Http\UseCases\Animal\Show;

/**
 * 動物コントローラー
 */
class AnimalController extends Controller
{
    /**
     * 動物の一覧の取得
     *
     * @param IndexRequest $request
     * @param Index $useCase
     * @return IndexResourceCollection
     * @apiResourceCollection Services\SampleAlice\App\Http\Resources\Animal\IndexResourceCollection
     * @apiResourceModel Services\SampleAlice\App\Models\Animal
     */
    public function index(IndexRequest $request, Index $useCase): IndexResourceCollection
    {
        return new IndexResourceCollection($useCase());
    }

    /**
     * 動物の詳細の取得
     *
     * @param ShowRequest $request
     * @param int $id
     * @param Show $useCase
     * @return ShowResource
     * @apiResource Services\SampleAlice\App\Http\Resources\Animal\ShowResource
     * @apiResourceModel Services\SampleAlice\App\Models\Animal
     */
    public function Show(ShowRequest $request, int $id, Show $useCase): ShowResource
    {
        return new ShowResource($useCase($id));
    }
}
