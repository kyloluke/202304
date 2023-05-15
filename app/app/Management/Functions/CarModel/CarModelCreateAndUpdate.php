<?php

namespace App\Management\Functions\CarModel;

use App\Management\Apis\Lp3Cargo\CarModel\CarModelCreateApi;
use App\Management\Apis\Lp3Cargo\CarModel\CarModelUpdateApi;
use App\Management\Screens\Master\CarModelListScreen;

/**
 * 車種の登録・更新
 */
class CarModelCreateAndUpdate
{
    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        //車種一覧画面の作成、更新
        (new CarModelListScreen())->create();
        (new CarModelListScreen())->update();

        //車種の作成API、車種の更新API
        (new CarModelCreateApi())->main();
        (new CarModelUpdateApi())->main();

        return true;
    }
}
