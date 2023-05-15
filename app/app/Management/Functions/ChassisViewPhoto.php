<?php

namespace App\Management\Functions;

use App\Management\Apis\Lp3Cargo\ChassisGetPhotoApi;
use App\Management\Models\Chassis;
use App\Management\Screens\Chassis\ChassisDetailScreen;
use App\Management\Screens\Chassis\ChassisListScreen;

/**
 * 車輌の車輌写真の表示
 */
class ChassisViewPhoto
{
    public function main(): bool
    {

        (new Chassis)->photos;

        // 車輌の一覧画面で写真の表示をする
        (new ChassisListScreen())->viewPhoto();
        // 車輌の詳細画面で写真の表示をする
        (new ChassisDetailScreen())->viewPhoto();
        // 車輌の写真の取得APIを使う
        (new ChassisGetPhotoApi())->get();
        return true;
    }
}
