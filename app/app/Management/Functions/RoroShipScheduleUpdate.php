<?php

namespace App\Management\Functions;

use App\Management\Apis\Lp3Ship\RoroShipScheduleGetDetailApi;
use App\Management\Apis\Lp3Ship\RoroShipScheduleupdateApi;
use App\Management\Screens\ShipSchedule\RoroShipScheduleEditScreen;

/**
 * RORO船スケジュールの更新
 */
class RoroShipScheduleUpdate
{
    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        //RORO船スケジュールの編集画面、更新モード
        (new RoroShipScheduleEditScreen())->updateMode();

        //RORO船スケジュールの詳細の取得API
        (new RoroShipScheduleGetDetailApi())->main();
        //RORO船スケジュールの更新API
        (new RoroShipScheduleUpdateApi())->main();

        return false;
    }
}
