<?php

namespace App\Management\Functions;

use App\Management\Apis\Lp3Sales\ChassisBulkUpdateOtherBillingItems;
use App\Management\Apis\Lp3Sales\ChassisUpdateOtherBillingItems;
use App\Management\Screens\Chassis\ChassisBulkEditOtherBillingItemsScreen;
use App\Management\Screens\Chassis\ChassisEditScreen;

/**
 * 車輌のその他請求明細の編集
 */
class ChassisEditOtherBillingItems
{
    public function main(): bool
    {
        // 車輌編集画面のその他請求明細の編集
        (new ChassisEditScreen())->editOtherBillingItems();
        // 車輌のその他請求明細の更新API
        (new ChassisUpdateOtherBillingItems())->main();

        // 車輌のその他請求明細の一括編集画面
        (new ChassisBulkEditOtherBillingItemsScreen())->bulkEdit();
        // 車輌のその他請求明細の一括更新API
        (new ChassisBulkUpdateOtherBillingItems())->main();

        return true;
    }
}
