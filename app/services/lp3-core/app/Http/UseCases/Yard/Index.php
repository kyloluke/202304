<?php

namespace Services\Lp3Core\App\Http\UseCases\Yard;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Services\Lp3Core\App\Models\Yard;

/**
 * ヤードの一覧の取得
 */
class Index
{
    /**
     * 関数呼び出し
     * 
     * @param array<string mixed> $requestData
     */
    public function __invoke($requestData): LengthAwarePaginator
    {
        $query = Yard::query()->with('yardGroup');

        if (isset($requestData["nameKeyWords"])) {
            $query->whereNames($requestData["nameKeyWords"]);
        }

        if (isset($requestData["yardStatus"])) {
            $query->where('status', $requestData["yardStatus"]);
        }

        if (isset($requestData["capacities"])) {
            $query->whereIn('capacity', $requestData["capacities"]);
        }

        $yards = $query->paginate();
        return $yards;
    }
}
