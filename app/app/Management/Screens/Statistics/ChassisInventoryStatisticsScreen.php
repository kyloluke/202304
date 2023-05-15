<?php

namespace App\Management\Screens\Statistics;

use App\Management\Screens\Enums\ScreenCategory;
use App\Management\Screens\Screen;

/**
 * 車輌の在庫の統計情報画面
 */
class ChassisInventoryStatisticsScreen extends Screen
{
    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 1101;
    }

    /**
     * @see Screen::docScreenCategory()
     */
    public function docScreenCategory(): ScreenCategory|null
    {
        return ScreenCategory::Statistics;
    }

    /**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return '車輌の在庫の統計情報';
    }

    /**
     * ヤードの在庫のCSVをダウンロードする
     */
    public function downLoadYardInventoryCsv(): bool
    {
        //ヤード毎の何日～何日の時点の車輌の在庫の数を記載したCSVをダウンロードできるようにする
        return false;
    }
}
