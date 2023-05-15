<?php

namespace App\Management\Functions;

use App\Management\Apis\Lp3Ship\RoroShipScheduleGetIndexApi;
use App\Management\Screens\ShipSchedule\RoroShipScheduleListScreen;

/**
 * RORO船スケジュールの検索
 */
class RoroShipScheduleSearch
{
    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        //RORO船スケジュールの一覧画面
        (new RoroShipScheduleListScreen())->search();
        //RORO船スケジュールの一覧の取得API
        (new RoroShipScheduleGetIndexApi())->main();

        return true;
    }
}
