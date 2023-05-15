<?php

namespace Services\Lp3Ship\App\Http\UseCases\ContainerShipSchedule;

use Services\Lp3Ship\App\UseCases\ContainerScheduleCheckUnique;

class CheckUnique
{
    /**
     * 関数呼び出し
     */
    public function __invoke(array $data, int|null $id = null): bool
    {
        return (new ContainerScheduleCheckUnique)($data, $id);
    }
}
