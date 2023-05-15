<?php

namespace App\Management\Requirements;

use App\Management\Models\Product;
use App\Management\Models\ProductPurchaseUnitPrice;

/**
 * La-Plus３：開発主要要件一覧　No.47
 */
class Requirement47
{
    //機能カテゴリ(サービス)
    //物流サービス販売管理

    //サブカテゴリ
    //サービス登録・編集

    //要件・要望
    //サービスに対して、仕入れコストを設定できるようにする
    //仕様はプロトタイプのMarketingシステムをベースに考える

    //補足
    //(なし)

    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        //商品に対して、仕入単価を設定出来るようにする
        (new Product());
        (new ProductPurchaseUnitPrice());

        return true;
    }
}
