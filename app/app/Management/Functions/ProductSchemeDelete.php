<?php

namespace App\Management\Functions;

use App\Management\Apis\Lp3Sales\ProductScheme\ProductSchemeDeleteApi;
use App\Management\Apis\Lp3Sales\ProductScheme\ProductSchemeGetDetailApi;
use App\Management\Screens\Sales\ProductSchemeEditScreen;

/**
 * 商品スキームの削除
 */
class ProductSchemeDelete
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
        //商品スキームの削除API
        (new ProductSchemeDeleteApi())->main();

        return true;
    }
}
