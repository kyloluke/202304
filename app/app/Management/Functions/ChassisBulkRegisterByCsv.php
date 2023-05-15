<?php

namespace App\Management\Functions;

use App\Management\Apis\Lp3Cargo\ChassisBulkImportForCreateCsvApi;
use App\Management\Files\CsvFile;
use App\Management\Screens\Chassis\ChassisListScreen;

/**
 * 車輌のCSV一括登録
 */
class ChassisBulkRegisterByCsv
{
    public function main(): bool
    {
        //データのやり取りをする際に広く使われているため、CSVで出来るようになっているのが無難
        //参考:2023/02/21 SYNC大淵さんとの打ち合わせ
        (new CsvFile());

        //車輌一覧画面のCSV一括作成
        (new ChassisListScreen())->bulkCreatebyCsv();

        //車輌の一括作成用CSVのインポートAPI
        (new ChassisBulkImportForCreateCsvApi())->main();

        return false;
    }
}
