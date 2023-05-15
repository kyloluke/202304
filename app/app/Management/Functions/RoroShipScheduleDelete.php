<?php

namespace App\Management\Functions;

use App\Management\Apis\Lp3Ship\RoroShipScheduleDeleteApi;
use App\Management\Apis\Lp3Ship\RoroShipScheduleGetDetailApi;
use App\Management\Screens\ShipSchedule\RoroShipScheduleEditScreen;

/**
 * RORO船スケジュールの削除
 */
class RoroShipScheduleDelete
{
    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        //RORO船スケジュールの編集画面、更新モード＋削除
        (new RoroShipScheduleEditScreen())->updateMode();
        (new RoroShipScheduleEditScreen())->delete();

        //RORO船スケジュールの詳細の取得API
        (new RoroShipScheduleGetDetailApi())->main();
        //RORO船スケジュールの削除API
        (new RoroShipScheduleDeleteApi())->main();

        return false;
    }
}
