<?php

namespace App\Management\Requirements;

use App\Management\Functions\MiscUi;

/**
 * La-Plus３：開発主要要件一覧　No.2
 */
class Requirement2
{
    //機能カテゴリ(サービス)
    //車輌管理

    //サブカテゴリ
    //一覧・検索

    //要件・要望
    //デフォルトのソートに戻す機能を追加

    //補足
    //(なし)

    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        //No.17, No.30 も同じ
        (new MiscUi())->restoreDefaultSort();

        return true;
    }
}
