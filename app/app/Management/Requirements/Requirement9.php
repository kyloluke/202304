<?php

namespace App\Management\Requirements;

use App\Management\Functions\ChassisRestore;

/**
 * La-Plus３：開発主要要件一覧　No.9
 */
class Requirement9
{
    //機能カテゴリ(サービス)
    //車輌管理

    //サブカテゴリ
    //登録・編集

    //要件・要望
    //削除された車輛を表示する機能

    //補足
    //間違って削除された場合などの復旧のため。また、だれがいつ消したか確認するため。

    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        // 「削除された車輌の復旧」の機能を作成する
        (new ChassisRestore)->main();

        return true;
    }
}
