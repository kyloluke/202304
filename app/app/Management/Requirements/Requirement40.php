<?php

namespace App\Management\Requirements;

use App\Management\Models\ContShipScheduleItem;

/**
 * La-Plus３：開発主要要件一覧　No.40
 */
class Requirement40
{
    //機能カテゴリ(サービス)
    //本船スケジュール管理

    //サブカテゴリ
    //登録・編集

    //要件・要望
    //2種類のCUT日を登録できるようにしたい。　ドキュメントCUT日　、　CY　CUT日　の二種類。どちらも手入力となる。（ヤードや日にちによって変わる）

    //補足
    //(なし)

    /**
     * main
     *
     * @return bool
     */
    public function main()
    {
        //コンテナ船スケジュール明細に、「ドキュメントCUT日」のパラメータを追加
        (new ContShipScheduleItem())->documentCutAt;

        return true;
    }
}
