<?php

namespace Services\Lp3Core\App\Http\UseCases\Organization;

use Illuminate\Pagination\LengthAwarePaginator;
use Services\Lp3Core\App\Models\Organization;

/**
 * 組織の一覧の取得
 */
class Index
{
    /**
     * 関数呼び出し
     */
    public function __invoke($requestData): LengthAwarePaginator
    {
        $query = Organization::query()->with(
            'organizationLogoFile',
            'offices',
            'users',
            'yardGroups'
        );

        if (isset($requestData["nameKeyWords"])) {
            $query->whereNameKeyWords($requestData["nameKeyWords"]);
        }

        if (isset($requestData["systemUsage"])) {
            $query->where('system_usage', $requestData["systemUsage"]);
        }

        return $query->paginate();
    }
}
