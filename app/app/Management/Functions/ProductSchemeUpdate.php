<?php

namespace App\Management\Functions;

use App\Management\Apis\Lp3Sales\ProductScheme\ProductSchemeGetDetailApi;
use App\Management\Screens\Sales\ProductSchemeEditScreen;

/**
 * 商品スキームの更新
 */
class ProductSchemeUpdate
{
    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        //商品スキーム編集画面の更新モード
        (new ProductSchemeEditScreen())->updateMode();

        //商品スキームの詳細の取得API
        (new ProductSchemeGetDetailApi())->main();
        //商品スキームの更新API
        (new ProductSchemeUpdateApi())->main();

        return true;
    }
}
