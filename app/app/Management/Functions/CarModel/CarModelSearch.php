<?php

namespace App\Management\Functions\CarModel;

use App\Management\Apis\Lp3Cargo\CarModel\CarModelGetIndexApi;
use App\Management\Screens\Master\CarModelListScreen;

/**
 * 車種の検索
 */
class CarModelSearch
{
    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        //車種一覧画面の検索
        (new CarModelListScreen())->search();
        //車種の一覧の取得API
        (new CarModelGetIndexApi())->main();

        return true;
    }
}
