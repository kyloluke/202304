<?php

namespace App\Management\Functions;

use App\Management\Apis\Lp3Cargo\ChassisGetUpdateHistoryApi;
use App\Management\Models\Chassis;
use App\Management\Screens\Chassis\ChassisDetailScreen;
use App\Management\Screens\Chassis\ChassisListScreen;

/**
 * 車輌の変更履歴の表示
 */
class ChassisViewChangeHistory
{
    // LP3要件・要望
    // 履歴に保存する項目の見直し

    //---

    //日付 = 搬入日時、搬出日時
    //保管ヤード = 保管ヤード
    //STATUS = 保管ヤードからみた状態(搬入前、搬入中、搬出済、...)
    //更新者 = 操作ユーザー
    //に置き換え、ヤードの搬入履歴として管理する

    public function main(): bool
    {

        (new Chassis)->changeHistories;

        // 車輌の一覧画面で変更履歴の表示をする ※一覧では不要かも
        (new ChassisListScreen())->viewChangeHistory();
        // 車輌の詳細画面で変更履歴の表示をする
        (new ChassisDetailScreen())->viewChangeHistory();

        // 車輌の変更履歴の取得APIを使う
        (new ChassisGetUpdateHistoryApi())->main();

        return true;
    }
}
