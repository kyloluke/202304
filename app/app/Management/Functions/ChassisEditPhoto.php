<?php

namespace App\Management\Functions;

use App\Management\Apis\Lp3Cargo\ChassisBulkUpdatePhotoApi;
use App\Management\Screens\Chassis\ChassisPhotoScreen;

/**
 * 車輌の車輌写真の編集
 */
class ChassisEditPhoto
{
    public function main()
    {
        // 車輌写真画面の一括更新
        (new ChassisPhotoScreen())->bulkUpdate();

        // 車輌の一括更新API
        (new ChassisBulkUpdatePhotoApi())->main();

        return false;
    }
}
