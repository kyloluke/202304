<?php

namespace App\Management\Requirements;

use App\Management\Screens\ContainerJob\ContJobListScreen;

/**
 * La-Plus３：開発主要要件一覧　No.16
 */
class Requirement16
{
    //機能カテゴリ(サービス)
    //コンテナ船積管理

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
    public function main()
    {
        //一覧画面で、検索フォームや検索結果の一覧に表示する項目をユーザーごとにカスタマイズする、というアイディアがあったが、
        //検索フォーム、検索結果の一覧、共に「シンプル」「詳細」の2種類に項目を分類し、「詳細」の項目は表示をON/OFFできるようにする、ということになった。

        //検索フォームの項目を「シンプル」「詳細」の2種類に分け、「詳細」の項目は折りたたんで表示するようにする
        (new ContJobListScreen())->foldSearchFormControls();

        return true;
    }
}
