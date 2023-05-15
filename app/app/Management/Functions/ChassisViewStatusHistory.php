<?php

namespace App\Management\Functions;

use App\Management\Apis\Lp3Cargo\ChassisGetIndexCarryActivityApi;
use App\Management\Models\Chassis;
use App\Management\Screens\Chassis\ChassisDetailScreen;

/**
 * 車輌のステータス変更履歴の表示
 */
class ChassisViewStatusHistory
{
    // LP3要件・要望
    // 保存するときに以下の項目を履歴として残す
    // 日付/保管ヤード/STATUS/更新者

    //---

    //日付 = 搬入日時、搬出日時
    //保管ヤード = 保管ヤード
    //STATUS = 保管ヤードからみた状態(搬入前、搬入中、搬出済、...)
    //更新者 = 操作ユーザー
    //に置き換え、ヤードの搬入履歴として管理する

    public function main():bool{

        (new Chassis)->yardCarryInOutHistories;

        // 車輌の詳細画面でヤードの搬入履歴の表示をする
        (new ChassisDetailScreen())->viewYardCarryInOutHistory();
        // 車輌のヤード搬入履歴の取得APIを使う
        (new ChassisGetIndexCarryActivityApi())->main();
        return true;
    }
}
