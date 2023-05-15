<?php

namespace App\Management\Screens\Chassis;

use App\Management\Enums\Worker;
use App\Management\Screens\Enums\ScreenCategory;
use App\Management\Screens\Enums\ScreenImageProgress;
use App\Management\Screens\Screen;

/**
 * 車輌変更履歴画面
 */
class ChassisChangeHistoryScreen extends Screen
{
    // @TBC 車輌詳細画面に「アクティビティ」を表示する箇所があり、「アクティビティ」と「変更履歴」でそれぞれ何を表示するか、という点を決める必要がある

    /**
     * @see Screen::docIdWhenDefiningRequirements()
     */
    public function docIdWhenDefiningRequirements(): int|null
    {
        return 11;
    }

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 215;
    }

    /**
     * @see Screen::docScreenCategory()
     */
    public function docScreenCategory(): ScreenCategory|null
    {
        return ScreenCategory::Chassis;
    }

    /**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return '車輌の変更履歴';
    }

    /**
     * @see Screen::docScreenImageProgress()
     */
    public function docScreenImageProgress(): ScreenImageProgress|null
    {
        return parent::docScreenImageProgress();
    }

    /**
     * @see Screen::docScreenImageInCharge()
     */
    public function docScreenImageInCharge(): Worker|null
    {
        return parent::docScreenImageInCharge();
    }
}
