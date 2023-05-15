<?php

namespace App\Management\Requirements;

use App\Management\Screens\ContainerJob\ContJobListScreen;

/**
 * La-Plus３：開発主要要件一覧　No.17
 */
class Requirement17
{
    //機能カテゴリ(サービス)
    //コンテナ船積管理

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
    public function main()
    {
        //コンテナJOB一覧画面で、デフォルトのソートを復元する機能を作成する
        (new ContJobListScreen())->restoreDefaultSort();

        return true;
    }
}
