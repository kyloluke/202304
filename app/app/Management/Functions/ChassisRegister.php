<?php

namespace App\Management\Functions;

use App\Management\Apis\Lp3Cargo\ChassisCreateApi;
use App\Management\Screens\Chassis\ChassisEditScreen;

/**
 * 車輌の登録
 */
class ChassisRegister
{
    public function main(): bool
    {
        // 車輌編集画面の作成モード
        (new ChassisEditScreen())->createMode();

        // 車輌編集画面の連続作成
        // @note 機能一覧のNo.11のメモ：・連続登録機能
        (new ChassisEditScreen())->createInSuccession();

        // 車輌の作成API
        (new ChassisCreateApi())->main();

        return true;
    }
}
