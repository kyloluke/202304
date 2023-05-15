<?php

namespace App\Management\Functions;

use App\Management\Apis\Lp3Sales\ProductScheme\ProductSchemeCreateApi;
use App\Management\Screens\Sales\ProductSchemeEditScreen;

/**
 * 商品スキームの作成
 */
class ProductSchemeCreate
{
    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        //商品スキーム編集画面の作成モード
        (new ProductSchemeEditScreen())->createMode();

        //商品スキームの作成API
        (new ProductSchemeCreateApi())->main();

        return true;
    }
}
