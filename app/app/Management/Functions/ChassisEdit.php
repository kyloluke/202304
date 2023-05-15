<?php

namespace App\Management\Functions;

use App\Management\Apis\Lp3Cargo\ChassisUpdateApi;
use App\Management\Screens\Chassis\ChassisEditScreen;

/**
 * 車輌の編集
 */
class ChassisEdit
{
    public function main(): bool
    {
        // 車輌の編集画面の作成モード
        (new ChassisEditScreen())->updateMode();

        // 車輌の更新API
        (new ChassisUpdateApi())->main();

        return true;
    }
}
