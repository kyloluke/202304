<?php

namespace App\Management\Requirements;

use App\Management\Screens\ContainerJob\ContJobScheduleListScreen;

/**
 * La-Plus３：開発主要要件一覧　No.26
 */
class Requirement26
{
    //機能カテゴリ(サービス)
    //コンテナ作業スケジュール管理

    //サブカテゴリ
    //一覧・検索

    //要件・要望
    //ユーザーの種別（OR　権限）によって、不要な検索項目を非表示にしたい（よりシンプルに）

    //補足
    //ユーザーごとに表示項目のカスタマイズができれるのがよい

    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        // > コンテナ船積JOBスケジュール画面で必要な検索項目
        // > (省略)
        // > 引用元: 議事録/2023/02/28 - 要件定義 (ヤードグループ・権限他)・設計周りの質問等 https://sync-logi.backlog.com/alias/wiki/2479707
        //
        //コンテナJOBのスケジュール一覧画面の「検索」に、必要な検索項目を記載している
        (new ContJobScheduleListScreen())->search();

        return true;
    }
}
