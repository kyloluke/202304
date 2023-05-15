<?php

namespace Services\Lp3Core\App\Http\Controllers;

use Services\Lp3Core\App\Http\Requests\Holiday\IndexRequest;
use Services\Lp3Core\App\Http\Resources\Holiday\IndexResourceCollection;
use Services\Lp3Core\App\Http\UseCases\Holiday\Index;

/**
 * 祝日コントローラー
 */
class HolidayController extends Controller
{
    /**
     * 祝日の一覧の取得
     *
     * @param IndexRequest $request
     * @param Index $useCase
     * @return IndexResourceCollection
     * @apiResourceCollection Services\Lp3Core\App\Http\Resources\Holiday\IndexResourceCollection
     * @apiResourceModel Services\Lp3Core\App\Models\Holiday
     */
    public function index(IndexRequest $request, Index $useCase): IndexResourceCollection
    {
        return new IndexResourceCollection($useCase());
    }
}
