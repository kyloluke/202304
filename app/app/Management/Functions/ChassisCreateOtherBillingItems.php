<?php

namespace App\Management\Functions;

use App\Management\Apis\Lp3Sales\ChassisBulkUpdateOtherBillingItems;
use App\Management\Apis\Lp3Sales\ChassisGetOtherBillingItemsApi;
use App\Management\Apis\Lp3Sales\ChassisUpdateOtherBillingItems;
use App\Management\Screens\Chassis\ChassisBulkEditOtherBillingItemsScreen;
use App\Management\Screens\Chassis\ChassisEditScreen;

/**
 * 車輌のその他請求明細の登録
 */
class ChassisCreateOtherBillingItems
{
    public function main(): bool
    {
        // 車輌編集画面のその他請求明細の編集
        (new ChassisEditScreen())->editOtherBillingItems();
        // 車輌のその他請求明細の一覧取得、一括更新API
        (new ChassisGetOtherBillingItemsApi())->main();
        (new ChassisUpdateOtherBillingItems())->main();

        // 車輌のその他請求明細の一括編集画面
        (new ChassisBulkEditOtherBillingItemsScreen())->bulkEdit();
        // 車輌のその他請求明細の一括更新API
        (new ChassisBulkUpdateOtherBillingItems())->main();

        return true;
    }
}
