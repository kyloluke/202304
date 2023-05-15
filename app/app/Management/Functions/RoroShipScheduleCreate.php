<?php

namespace App\Management\Functions;

use App\Management\Apis\Lp3Ship\RoroShipScheduleCreateApi;
use App\Management\Screens\ShipSchedule\RoroShipScheduleEditScreen;

/**
 * RORO船スケジュールの作成
 */
class RoroShipScheduleCreate
{
    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        //RORO船スケジュールの編集画面、作成モード
        (new RoroShipScheduleEditScreen())->createMode();

        //RORO船スケジュールの作成API
        (new RoroShipScheduleCreateApi())->main();

        return false;
    }
}
