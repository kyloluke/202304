<?php

namespace App\Management\Functions;

use App\Management\Apis\Lp3Ship\ContShipScheduleGetIndexApi;
use App\Management\Screens\ShipSchedule\ContShipScheduleListScreen;

/**
 * コンテナ船スケジュールの検索
 */
class ContShipScheduleSearch
{
    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        //コンテナ船スケジュールの一覧画面
        (new ContShipScheduleListScreen())->search();
        //コンテナ船スケジュールの一覧の取得API
        (new ContShipScheduleGetIndexApi())->main();

        return true;
    }
}
