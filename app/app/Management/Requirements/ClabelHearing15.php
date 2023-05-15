<?php

namespace App\Management\Requirements;

use App\Management\Screens\Statistics\ChassisInventoryStatisticsScreen;

/**
 * ヒアリング改善要望 No.15
 */
class ClabelHearing15
{
    //課題＆要望
    //時点在庫の確認方法がわからない、わかりやすくしてほしい

    //背景/理由
    //(なし)

    //改善案
    //デザインの問題

    //メモ
    //タスクはシーラベル
    //すでにできる

    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        //SYNC大淵さんが「LP2には時点在庫のCSVのダウンロードの機能がある」ということを博多港運さんに伝えており、
        //博多港運さんから「時点在庫のCSVのダウンロードの機能が欲しい」という要望が挙がっていた、というところからスタートしている要件
        //
        //2023/02/28のシーラベルとの打ち合わせの際に、
        //統計情報のカテゴリとして、ヤードの時点在庫の統計情報の画面を作成し、その画面から時点在庫のCSVのダウンロードが出来るようになっているのが良い、という話になった。

        // @todo ↓機能として整理する、APIなども必要
        // 車輌の在庫の統計情報画面を作成し、その画面にヤードの在庫のCSVをダウンロードする機能をつける
        (new ChassisInventoryStatisticsScreen())->downLoadYardInventoryCsv();

        return true;
    }
}
