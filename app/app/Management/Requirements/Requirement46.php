<?php

namespace App\Management\Requirements;

use App\Management\Screens\Sales\ProductListScreen;

/**
 * La-Plus３：開発主要要件一覧　No.46
 */
class Requirement46
{
    //機能カテゴリ(サービス)
    //物流サービス販売管理

    //サブカテゴリ
    //サービス一覧

    //要件・要望
    //(なし)

    //補足
    //(なし)

    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        //商品の一覧画面を作成する
        (new ProductListScreen());

        return true;
    }
}
