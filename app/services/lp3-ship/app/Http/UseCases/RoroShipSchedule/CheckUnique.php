<?php

namespace Services\Lp3Ship\App\Http\UseCases\RoroShipSchedule;

use Services\Lp3Ship\App\UseCases\RoroScheduleCheckUnique;

class CheckUnique
{
    /**
     * 関数呼び出し
     */
    public function __invoke(array $data, int|null $id = null): bool
    {
        return (new RoroScheduleCheckUnique)($data, $id);
    }
}
