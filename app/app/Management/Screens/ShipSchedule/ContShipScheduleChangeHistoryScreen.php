<?php

namespace App\Management\Screens\ShipSchedule;

use App\Management\Screens\Enums\ScreenCategory;
use App\Management\Screens\Screen;

/**
 * コンテナ船スケジュール変更履歴画面
 */
class ContShipScheduleChangeHistoryScreen extends Screen
{
    /**
     * @see Screen::docIdWhenDefiningRequirements()
     */
    public function docIdWhenDefiningRequirements(): int|null
    {
        return 55;
    }

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 304;
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
        return 'コンテナ船のスケジュール変更履歴';
    }

    /**
     * 変更履歴を表示する
     */
    public function viewChangeHistories(){

    }
}
