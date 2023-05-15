<?php

namespace App\Management\Functions;

use App\Management\Apis\Lp3Cargo\ChassisBulkImportCsvForDimensionApi;
use App\Management\Screens\Chassis\ChassisListScreen;

/**
 * 車輌のCSV一括更新
 */
class ChassisBulkUpdateByCsv
{
    public function main(): bool
    {
        //CSV一括作成と、CSV一括取込(=寸法取込)の機能はどちらも必要だが、
        //1つの機能で作成と寸法の更新の両方ができるのであれば統合しても構わない
        //参考:2023/02/14 SYNC大淵さんとの打ち合わせ https://sync-logi.backlog.com/alias/wiki/2451536

        //車輌一覧画面のCSV一括更新
        (new ChassisListScreen())->bulkUpdatebyCsv();

        //車輌の一括寸法用CSVのインポートAPI
        (new ChassisBulkImportCsvForDimensionApi())->main();

        return false;
    }
}
