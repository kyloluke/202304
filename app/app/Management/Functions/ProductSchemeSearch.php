<?php

namespace App\Management\Functions;

use App\Management\Apis\Lp3Sales\ProductScheme\ProductSchemeGetIndexApi;
use App\Management\Screens\Sales\ProductSchemeListScreen;

/**
 * 商品スキームの検索
 */
class ProductSchemeSearch
{
    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        //商品スキーム一覧画面
        (new ProductSchemeListScreen())->search();

        //商品スキームの一覧の取得API
        (new ProductSchemeGetIndexApi())->main();

        return true;
    }
}
