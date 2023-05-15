<?php

namespace App\Management\Functions;

use App\Management\Models\Chassis;

/**
 * 車輌の一時搬出を依頼する
 */
class ChassisRequestTempOut
{
    public function main(): bool
    {
        //SYNC OPのスタッフは内貨搬出、一時搬出の区別をつけて依頼を出すことが可能なので、
        //画面上の操作として「内貨搬出依頼」「一時搬出依頼」が別になっていても構わない
        //参考:2023/02/14 SYNC大淵さんとの打ち合わせ https://sync-logi.backlog.com/alias/wiki/2451536

        (new Chassis)->tempOutHistories;

        // @todo 要確認 一時搬出依頼がある車輌の絞り込みが必要では？

        // @todo 車輌詳細画面での一時搬出依頼

        // @todo 車輌の搬出依頼のAPI(一時搬出)
        // @todo ヤードスタッフへの通知

        return false;
    }
}
