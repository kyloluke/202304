<?php

namespace App\Management\Functions;

use App\Management\Apis\Lp3Ship\ContShipScheduleGetDetailApi;
use App\Management\Apis\Lp3Ship\ContShipScheduleUpdateApi;
use App\Management\Screens\ShipSchedule\ContShipScheduleEditScreen;

/**
 * コンテナ船スケジュールの更新
 */
class ContShipScheduleUpdate
{
    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        //コンテナ船スケジュールの編集画面、更新モード
        (new ContShipScheduleEditScreen())->updateMode();

        //コンテナ船スケジュールの詳細の取得API
        (new ContShipScheduleGetDetailApi())->main();
        //コンテナ船スケジュールの更新API
        (new ContShipScheduleUpdateApi())->main();

        return false;
    }
}
