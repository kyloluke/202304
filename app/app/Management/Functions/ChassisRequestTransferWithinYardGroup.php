<?php

namespace App\Management\Functions;

use App\Management\Screens\Chassis\ChassisDetailScreen;
use App\Management\Screens\Chassis\ChassisListScreen;

/**
 * 車輌のヤードグループ内の移動依頼
 */
class ChassisRequestTransferWithinYardGroup
{
    public function main(): bool
    {
        //車輌一覧画面と車輌詳細画面に(内貨)搬出依頼のためのUIを作成する
        //ヤードグループ間の移動、ヤードグループ内の移動の違いは意識しなくても良いようなUIにし、ヤードグループ間の移動なのか、ヤードグループ内の移動なのかはシステムで判定する
        (new ChassisListScreen())->requestCarryOut();
        (new ChassisDetailScreen())->requestCarryOut();

        // @todo 車輌の搬出依頼のAPI
        // @todo 搬出元のヤードスタッフ、搬入先のヤードスタッフへの通知が必要

        return false;
    }
}
