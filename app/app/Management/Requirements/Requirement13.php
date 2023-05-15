<?php

namespace App\Management\Requirements;

use App\Management\Models\Chassis;
use App\Management\Screens\Chassis\ChassisEditScreen;
use App\Management\Screens\Chassis\ChassisListScreen;

/**
 * La-Plus３：開発主要要件一覧　No.13
 */
class Requirement13
{
    //機能カテゴリ(サービス)
    //車輌管理

    //サブカテゴリ
    //一覧・検索

    //要件・要望
    //検索用のカスタムラベルの作成と車輛へのラベル設定機能

    //補足
    //ユーザーが車輛に対して独自のカスタムラベルを設定できるようにして、検索の利便性を高める

    //---

    //項目が多いので、見た目をスッキリしてほしい、という話から出てきた話
    //
    //事業所単位？ユーザー単位？ということもある
    //OSL側では必要だが、LP3側では不要

    /**
     * main
     *
     * @return bool
     */
    public function main()
    {
        (new Chassis())->customLabels;

        (new ChassisListScreen())->searchByCustomLabel();
        // 引用元: https://sync-logi.backlog.com/alias/wiki/2276022
        // 検索項目の多さについては使用しない項目は畳むなどの対応を行う。
        (new ChassisListScreen())->foldSearchFormControls();

        (new ChassisEditScreen())->editCustomLabel();

        // @todo OSLのカスタムラベルの設定関連の要素が必要

        return false;
    }
}
