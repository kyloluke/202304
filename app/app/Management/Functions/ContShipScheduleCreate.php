<?php

namespace App\Management\Functions;

use App\Management\Apis\Lp3Ship\ContShipScheduleCreateApi;
use App\Management\Screens\ShipSchedule\ContShipScheduleEditScreen;

/**
 * コンテナ船スケジュールの作成
 */
class ContShipScheduleCreate
{
    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        //コンテナ船スケジュールの編集画面、作成モード
        (new ContShipScheduleEditScreen())->createMode();

        //コンテナ船スケジュールの作成API
        (new ContShipScheduleCreateApi())->main();

        return false;
    }
}
