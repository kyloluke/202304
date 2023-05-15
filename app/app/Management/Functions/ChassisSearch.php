<?php

namespace App\Management\Functions;

use App\Management\Apis\Lp3Cargo\ChassisGetIndexApi;
use App\Management\Screens\Chassis\ChassisListScreen;

/**
 * 車輌の検索
 */
class ChassisSearch
{
    // ユーザーが指定した条件で車輌情報を検索し、条件に合致した車輌を一覧で表示する

    public function main():bool{
        (new ChassisListScreen())->search();
        (new ChassisGetIndexApi())->main();
        return true;
    }
}
