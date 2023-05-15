<?php

namespace App\Management\Functions;

use App\Management\Apis\Lp3Cargo\ChassisBulkRegisterCarryOutApi;
use App\Management\Apis\Lp3Cargo\ChassisRegisterCarryOutApi;
use App\Management\Models\Chassis;

/**
 * 車輌の内貨搬出の登録
 */
class ChassisRegisterCarryOut
{
    public function main(): bool
    {
        (new Chassis)->yardCarryInOutHistories;

        // @todo 作成 車輌一覧画面での内貨搬出の一括登録
        // 車輌の一括内貨搬出登録API
        (new ChassisBulkRegisterCarryOutApi())->main();

        // @todo 作成 車輌詳細画面での内貨搬出の登録
        // 車輌の内貨搬出登録API
        (new ChassisRegisterCarryOutApi())->main();

        return false;
    }
}
