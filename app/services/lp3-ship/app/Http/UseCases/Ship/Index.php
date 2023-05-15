<?php

namespace Services\Lp3Ship\App\Http\UseCases\Ship;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Services\Lp3Ship\App\Models\Ship;

/**
 * 本船の一覧の取得
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
        $builder = Ship::query();

        if (!is_null($requestData["name"])) {
            $builder->where('name', "LIKE", "%" . $requestData["name"] . "%");
        }
        if (!is_null($requestData["type"])) {
            $builder->where('type', '=', $requestData["type"]);
        }

        $ships = $builder->paginate();

        return $ships;
    }
}
