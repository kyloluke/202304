<?php

namespace App\Management\Functions;

use App\Management\Apis\Lp3Cargo\ChassisBulkDeleteApi;
use App\Management\Screens\Chassis\ChassisListScreen;

/**
 * 車輌の一括削除
 */
class ChassisBulkDelete
{
    //機能概要
    //一覧からの一括削除

    //LP3要件・要望
    //一部権限の人のみ可能

    public function main(): bool
    {
        // 車輌一覧画面の一括削除
        (new ChassisListScreen())->bulkDelete();

        // 車輌の一括削除API
        (new ChassisBulkDeleteApi())->main();

        return true;
    }
}
