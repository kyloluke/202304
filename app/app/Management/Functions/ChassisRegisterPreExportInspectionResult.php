<?php

namespace App\Management\Functions;

use App\Management\Apis\Lp3Cargo\ChassisCreateInspectionHistoryApi;
use App\Management\Apis\Lp3Cargo\ChassisDeleteInspectionHistoryApi;
use App\Management\Apis\Lp3Cargo\ChassisGetInspectionHistoriesApi;
use App\Management\Apis\Lp3Cargo\ChassisGetInspectionHistoryApi;
use App\Management\Apis\Lp3Cargo\ChassisUpdateInspectionHistoryApi;
use App\Management\Models\Chassis;
use App\Management\Screens\Chassis\ChassisDetailScreen;

/**
 * 車輌の輸出前検査の結果登録
 */
class ChassisRegisterPreExportInspectionResult
{
    /**
     * @return bool
     */
    public function main(): bool
    {
        // 車輌の(輸出前)検査履歴
        (new Chassis())->chassisExamEvents;

        // 車輌詳細画面の輸出前検査の編集
        (new ChassisDetailScreen())->editInspectionHistory();

        // 車輌の輸出前検査の一覧取得、詳細取得、作成、更新、削除
        (new ChassisGetInspectionHistoriesApi())->main();
        (new ChassisGetInspectionHistoryApi())->main();
        (new ChassisCreateInspectionHistoryApi())->main();
        (new ChassisUpdateInspectionHistoryApi())->main();
        (new ChassisDeleteInspectionHistoryApi())->main();

        return false;
    }
}
