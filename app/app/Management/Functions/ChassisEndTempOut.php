<?php

namespace App\Management\Functions;

use App\Management\Models\Chassis;

/**
 * 車輌の一時搬出の終了登録
 */
class ChassisEndTempOut
{
    public function main(): bool
    {
        //ヤードスタッフが、初回搬入/ヤード間移動での搬入/一時搬出の終了としての搬入、の区別をして搬入の登録をすることが難しいため、
        //画面上の操作としては「搬入」だけをしてもらい、内貨搬出依頼や一時搬出依頼の状況などを見て
        //初回搬入/ヤード間移動での搬入/一時搬出の終了としての搬入、の区別はシステムでした方が良い
        //参考:2023/02/14 SYNC大淵さんとの打ち合わせ https://sync-logi.backlog.com/alias/wiki/2451536

        (new Chassis)->tempOutHistories;

        // @todo 作成 車輌詳細画面での一時搬出の終了

        // @todo 作成 車輌の搬入登録のAPI

        return false;
    }
}
