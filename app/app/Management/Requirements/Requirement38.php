<?php

namespace App\Management\Requirements;

use App\Management\Screens\ShipSchedule\ContShipScheduleChangeHistoryScreen;
use App\Management\Screens\ShipSchedule\RoroShipScheduleChangeHistoryScreen;

/**
 * La-Plus３：開発主要要件一覧　No.38
 */
class Requirement38
{
    //機能カテゴリ(サービス)
    //本船スケジュール管理

    //サブカテゴリ
    //変更履歴

    //要件・要望
    //UIの改善

    //補足
    //アコーディオン形式がよいかもしれない

    /**
     * main
     *
     * @return bool
     */
    public function main()
    {
        // @todo まだ何も改善案を考えていない
        (new ContShipScheduleChangeHistoryScreen())->viewChangeHistories();
        (new RoroShipScheduleChangeHistoryScreen())->viewChangeHistories();

        return false;
    }
}
