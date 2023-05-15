<?php

namespace App\Management\Functions\CarModel;

use App\Management\Apis\Lp3Cargo\CarModel\CarModelBulkDownloadCsvApi;
use App\Management\Screens\Master\CarModelListScreen;

/**
 * 車種のCSVダウンロード
 */
class CarModelDownloadCsv
{
    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        //車種一覧画面のCSVのダウンロード
        (new CarModelListScreen())->downloadCsv();
        //複数車種のCSVエクスポートAPI
        (new CarModelBulkDownloadCsvApi())->main();

        return true;
    }
}
