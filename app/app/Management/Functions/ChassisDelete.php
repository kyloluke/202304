<?php

namespace App\Management\Functions;

use App\Management\Apis\Lp3Cargo\ChassisDeleteApi;
use App\Management\Screens\Chassis\ChassisEditScreen;

/**
 * 車輌の削除
 */
class ChassisDelete
{
    public function main(): bool
    {
        // 車輌の編集画面の削除
        (new ChassisEditScreen())->delete();

        // 車輌の削除API
        (new ChassisDeleteApi())->main();

        return true;
    }
}
