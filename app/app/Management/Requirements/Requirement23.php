<?php

namespace App\Management\Requirements;

use App\Management\Screens\ContainerJob\ContJobListScreen;

/**
 * La-Plus３：開発主要要件一覧　No.23
 */
class Requirement23
{
    //機能カテゴリ(サービス)
    //コンテナ船積管理

    //サブカテゴリ
    //登録・編集

    //要件・要望
    //「同一」請求の文言の見直し

    //補足
    //ツールチップでヘルプメッセージが表示されるようにすればよいか
    //同一とは。
    //1船に対して複数JOB（コンテナ）をまとめて請求するためのチェックボックス

    /**
     * main
     *
     * @return bool
     */
    public function main()
    {
        //シーラベルが作成した画面イメージを基に、文言を修正する
        //画面イメージ: https://docs.google.com/presentation/d/1gsFJLqo8HsoHAkLTt86q6ZYWGxiQLSFq7FeEd8ygiLM/edit#slide=id.g1f49323dbf3_0_4
        //・1つの請求書にまとめて登録
        //・個別の請求書として登録
        (new ContJobListScreen())->registerBilling();

        return true;
    }
}
