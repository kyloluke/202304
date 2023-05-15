<?php

namespace App\Management\Functions;

use App\Management\Models\Chassis;

/**
 * 車輌の一時搬出の開始登録
 */
class ChassisStartTempOut
{
    public function main(): bool
    {
        //ヤードスタッフが、内貨搬出/一時搬出、の区別をして搬出の登録をすることが難しいため、
        //画面上の操作としては「搬出」だけをしてもらい、内貨搬出依頼や一時搬出依頼の状況などを見て
        //内貨搬出/一時搬出、の区別はシステムでした方が良い
        //参考:2023/02/14 SYNC大淵さんとの打ち合わせ https://sync-logi.backlog.com/alias/wiki/2451536

        (new Chassis)->tempOutHistories;

        // @todo 作成 車輌詳細画面での一時搬出の開始

        // @todo 作成 車輌の搬出登録のAPI (一時搬出の依頼があるかどうかで、システムで一時搬出と判断する)

        return false;
    }
}
