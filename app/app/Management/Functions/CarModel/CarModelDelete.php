<?php

namespace App\Management\Functions\CarModel;

use App\Management\Apis\Lp3Cargo\CarModel\CarModelDeleteApi;
use App\Management\Screens\Master\CarModelListScreen;

/**
 * 車種の削除
 */
class CarModelDelete
{
    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        //車種一覧画面の削除
        (new CarModelListScreen())->delete();

        //車種の削除API
        (new CarModelDeleteApi())->main();

        return true;
    }
}
