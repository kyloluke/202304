<?php

namespace App\Management\Functions;

/**
 * 車輌の内貨搬出作業依頼通知
 */
class ChassisNotifyCarryOutRequested
{
    //機能概要
    //メール送信

    /**
     * @return bool
     */
    public function main(): bool
    {
        //「車輌の内貨搬出を依頼する」の機能の一部として作成する

        /** @see ChassisRequestLocalOut */

        return true;
    }
}
