<?php

namespace Services\Lp3Core\App\Http\Controllers;

use Services\Lp3Core\App\Http\Requests\TaxRate\ShowRequest;
use Services\Lp3Core\App\Http\Resources\TaxRate\ShowResource;
use Services\Lp3Core\App\Http\UseCases\TaxRate\Show;

/**
 * 消費税率コントローラー
 */
class TaxRateController extends Controller
{
    /**
     * 消費税率の取得
     *
     * @param ShowRequest $request
     * @param Show $useCase
     * @return ShowResource
     * @apiResource Services\Lp3Core\App\Http\Resources\TaxRate\ShowResource
     * @apiResourceModel Services\Lp3Core\App\Models\TaxRate
     */
    public function show(ShowRequest $request, Show $useCase, $id): ShowResource
    {
        return new ShowResource($useCase($id));
    }
}
