<?php

namespace App\Management\Requirements;

use App\Management\Models\Chassis;
use App\Management\Screens\Chassis\ChassisDetailScreen;

/**
 * La-Plus３：開発主要要件一覧　No.3
 */
class Requirement3
{
    //機能カテゴリ(サービス)
    //車輌管理

    //サブカテゴリ
    //登録・編集

    //要件・要望
    //更新履歴として保存する対象とする項目の見直し

    //補足
    //(なし)

    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        //引用元:https://sync-logi.backlog.com/alias/wiki/2418585
        //車輛詳細のアクティビティと近しい感じなので、そこで網羅できそうなら同じで大丈夫ではないか
        //
        //システム的にはすべての変更履歴を保持し、表示制御は後で調整できるようにしておく
        //履歴の表現の仕方は要検討

        //引用元:https://docs.google.com/spreadsheets/d/1OyjyJ59Os6QKUdt2cj9qcSe-YWiXx3bdOy8qrH_CzvA/edit?usp=sharing
        //今回追加される「アクティビティ」で同じように網羅されるなら問題ない。
        //システム的には元データはすべて取っておく。表示を選ぶ。

        //結論
        //変更履歴としてはすべての項目を保存する
        //表示を絞る必要がある可能性はあるが、まずは「アクティビティ」ですべての変更を表示できるようにする

        (new Chassis)->changeHistories;
        (new ChassisDetailScreen())->viewActivity();

        return true;
    }
}
