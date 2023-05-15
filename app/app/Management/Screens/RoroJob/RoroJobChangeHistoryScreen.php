<?php

namespace App\Management\Screens\RoroJob;

use App\Management\Screens\Enums\ScreenCategory;
use App\Management\Screens\Screen;

/**
 * ROROJOB変更履歴画面
 */
class RoroJobChangeHistoryScreen extends Screen
{
    /**
     * @see Screen::docIdWhenDefiningRequirements()
     */
    public function docIdWhenDefiningRequirements(): int|null
    {
        return 45;
    }

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 510;
    }

    /**
     * @see Screen::docScreenCategory()
     */
    public function docScreenCategory(): ScreenCategory|null
    {
        return ScreenCategory::RoroJob;
    }

    /**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return 'ROROJOBの変更履歴';
    }
}
