<?php

namespace App\Management\Functions;

use App\Management\Apis\Lp3Cargo\ChassisBulkCreatePhotoApi;
use App\Management\Screens\Chassis\ChassisPhotoScreen;

/**
 * 車輌の車輌写真の登録
 */
class ChassisRegisterPhoto
{
    public function main()
    {
        // 車輌写真画面の一括作成
        (new ChassisPhotoScreen())->bulkCreate();

        // 車輌の一括作成API
        (new ChassisBulkCreatePhotoApi())->main();

        return true;
    }
}
