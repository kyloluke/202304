<?php

namespace App\Management\Functions;

use App\Management\Apis\Lp3Ship\ContShipScheduleDeleteApi;
use App\Management\Apis\Lp3Ship\ContShipScheduleGetDetailApi;
use App\Management\Screens\ShipSchedule\ContShipScheduleEditScreen;

/**
 * コンテナ船スケジュールの削除
 */
class ContShipScheduleDelete
{
    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        //コンテナ船スケジュールの編集画面、更新モード＋削除
        (new ContShipScheduleEditScreen())->updateMode();
        (new ContShipScheduleEditScreen())->delete();

        //コンテナ船スケジュールの詳細の取得API
        (new ContShipScheduleGetDetailApi())->main();
        //コンテナ船スケジュールの削除API
        (new ContShipScheduleDeleteApi())->main();

        return false;
    }
}
