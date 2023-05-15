<?php

namespace App\Management\Requirements;

use App\Management\Screens\Chassis\ChassisListScreen;

/**
 * La-Plus３：開発主要要件一覧　No.14
 */
class Requirement14
{
    //機能カテゴリ(サービス)
    //車輌管理

    //サブカテゴリ
    //CSV一括登録機能

    //要件・要望
    //わかりやすくしたい（いまはSYNCさんがユーザーに都度教えたりしている）

    //補足
    //仕様を把握している一部ユーザーしか利用出来ていない機能となっているため有効活用できていない
    //直感的に見れば使い方がわかる。間違ったデータ登録がされないような手続きの流れ。

    /**
     * main
     *
     * @return bool
     */
    public function main()
    {
        // @todo たぶん何にも改善案考えられてない
        (new ChassisListScreen())->bulkCreatebyCsv();

        return false;
    }
}
