<?php

namespace App\Management\Requirements;

use App\Management\Screens\Chassis\ChassisListScreen;

/**
 * ヒアリング改善要望 No.11
 */
class ClabelHearing11
{
    //課題＆要望
    //作業会社用に検索条件の項目を簡略化したい

    //背景/理由
    //(なし)

    //改善案
    //・よく使いそうな検索3行程度のみ表示させる。それ以外は詳細検索で開いて使う
    //・お気に入り検索をわかりやすくする
    //・タブの仕様はavanteさんと大淵さんで仕様協議中（ヒアリングする）
    //・事業種別毎に表示させる検索項目を最低限精査する（例えばシッパーはシッパーの項目いらない）

    //メモ
    //タスクはシーラベル
    //
    //用途：見たい情報は決まっているので、検索は条件を何度も変えて表示という感じでなくてもよい
    //→検索は画面の上でOKそう

    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        //引用元: https://sync-logi.backlog.com/alias/wiki/2276022
        //検索項目の多さについては使用しない項目は畳むなどの対応を行う。
        (new ChassisListScreen())->foldSearchFormControls();

        (new ChassisListScreen())->favoriteSearches();

        // @todo 車輌一覧画面以外も対応する

        return false;
    }
}
