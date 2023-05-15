<?php

namespace App\Management\Functions;

use App\Management\Apis\Lp3Cargo\ChassisBulkRegisterCarryOutApi;
use App\Management\Apis\Lp3Cargo\ChassisRegisterCarryInApi;
use App\Management\Models\Chassis;

/**
 * 車輌の搬入の登録
 */
class ChassisRegisterCarryIn
{
    public function main(): bool
    {
        (new Chassis)->yardCarryInOutHistories;

        // @todo 作成 車輌一覧画面での搬入の一括登録
        // 車輌の一括搬入登録API
        (new ChassisBulkRegisterCarryOutApi)->main();

        // @todo 作成 車輌詳細画面での搬入の登録
        // 車輌の搬入登録API
        (new ChassisRegisterCarryInApi)->main();

        return false;
    }
}
