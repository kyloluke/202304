<?php

namespace App\Management\Screens\ShipSchedule;

use App\Management\Screens\Enums\ScreenCategory;
use App\Management\Screens\Screen;

/**
 * RORO船スケジュール変更履歴画面
 */
class RoroShipScheduleChangeHistoryScreen extends Screen
{
    /**
     * @see Screen::docIdWhenDefiningRequirements()
     */
    public function docIdWhenDefiningRequirements(): int|null
    {
        return 61;
    }

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 309;
    }

    /**
     * @see Screen::docScreenCategory()
     */
    public function docScreenCategory(): ScreenCategory|null
    {
        return ScreenCategory::ShipSchedule;
    }

    /**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return 'RORO船のスケジュール変更履歴';
    }

    /**
     * 変更履歴を表示する
     */
    public function viewChangeHistories()
    {

    }
}
