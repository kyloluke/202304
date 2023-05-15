<?php

namespace App\Management\Functions;

use App\Management\Apis\Lp3Cargo\ChassisBulkExportCsvForDimensionApi;
use App\Management\Screens\Chassis\ChassisListScreen;

/**
 * 車輌の寸法取込用CSVのダウンロード
 */
class ChassisDownloadCsvForImportDimension
{
    public function main(): bool
    {
        // 車輌の一覧画面の寸法取込用CSVのダウンロード
        (new ChassisListScreen())->downloadCsvForImportDimension();

        // 車輌の一括寸法用CSVのエクスポートAPI
        (new ChassisBulkExportCsvForDimensionApi())->main();

        return true;
    }
}
