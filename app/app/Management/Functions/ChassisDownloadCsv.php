<?php

namespace App\Management\Functions;

use App\Management\Apis\Lp3Cargo\ChassisDownloadCsvApi;
use App\Management\Screens\Chassis\ChassisListScreen;

/**
 * 車輌のCSVのダウンロード
 */
class ChassisDownloadCsv
{
    public function main(): bool
    {
        // 車輌の一覧画面のCSVダウンロード
        (new ChassisListScreen())->downloadCsv();

        // 車輌のCSVダウンロードAPI
        (new ChassisDownloadCsvApi())->main();

        return true;
    }
}
