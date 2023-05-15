<?php

namespace Services\Lp3Core\App\Http\UseCases\YardGroup;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Services\Lp3Core\App\Models\YardGroup;

/**
 * ヤードグループの一覧の取得
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
        $query = YardGroup::query()->with('yards', 'representativeYard');

        if (isset($requestData["nameKeyWords"])) {
            $query->whereNames($requestData["nameKeyWords"]);
        }

        if (isset($requestData["defaultPolId"])) {
            $query->where("default_pol_id", "=", $requestData["defaultPolId"]);
        }

        if (isset($requestData["yardStatus"])) {
            $query->whereYardStatus($requestData["yardStatus"]);
        }

        if (isset($requestData["capacities"])) {
            $query->whereYardCapacities($requestData["capacities"]);
        }

        if (isset($requestData["mailKeyWords"])) {
            $query->whereYardMails($requestData["mailKeyWords"]);
        }

        if (isset($requestData["defaultCustomBrokerOfficeId"])) {
            $query->whereDefaultCustomBrokerOfficeId($requestData["defaultCustomBrokerOfficeId"]);
        }

        $yardGroups = $query->paginate();
        return $yardGroups;
    }
}
