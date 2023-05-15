<?php

namespace App\Management\Functions;

use App\Management\Apis\Lp3Cargo\ChassisBulkDownloadPhotoApi;
use App\Management\Apis\Lp3Cargo\ChassisDownloadPhotoApi;
use App\Management\Screens\Chassis\ChassisListScreen;

/**
 * 車輌の写真のダウンロード
 */
class ChassisDownloadPhoto
{
    public function main(): bool
    {
        // 車輌一覧画面の写真ダウンロード
        (new ChassisListScreen())->downloadPhoto();
        // 車輌の写真一括ダウンロードAPI
        (new ChassisDownloadPhotoApi())->main();

        // 車輌一覧画面の写真一括ダウンロード
        (new ChassisListScreen())->bulkDownloadPhoto();
        // 車輌の写真一括ダウンロードAPI
        (new ChassisBulkDownloadPhotoApi())->main();

        return true;
    }
}
