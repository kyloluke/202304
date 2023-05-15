<?php

namespace App\Management\Screens\Master;

use App\Management\Screens\Enums\ScreenCategory;
use App\Management\Screens\Enums\ScreenImageProgress;
use App\Management\Screens\Screen;

/**
 * 港一覧画面
 */
class PortListScreen extends Screen
{
    /**
     * @see Screen::docIdWhenDefiningRequirements()
     */
    public function docIdWhenDefiningRequirements(): int|null
    {
        return 83;
    }

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 902;
    }

    /**
     * @see Screen::docScreenCategory()
     */
    public function docScreenCategory(): ScreenCategory|null
    {
        return ScreenCategory::Master;
    }

    /**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return '港の一覧';
    }

    /**
     * @see Screen::docScreenImageProgress()
     */
    public function docScreenImageProgress(): ScreenImageProgress|null
    {
        return ScreenImageProgress::Unnecessary;
    }
}
