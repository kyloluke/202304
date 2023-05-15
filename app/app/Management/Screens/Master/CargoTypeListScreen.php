<?php

namespace App\Management\Screens\Master;

use App\Management\Screens\Enums\ScreenCategory;
use App\Management\Screens\Enums\ScreenImageProgress;
use App\Management\Screens\Screen;

/**
 * 貨物種類一覧画面
 */
class CargoTypeListScreen extends Screen
{
    /**
     * @see Screen::docIdWhenDefiningRequirements()
     */
    public function docIdWhenDefiningRequirements(): int|null
    {
        return 93;
    }

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 905;
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
        return '貨物種類の一覧';
    }

    /**
     * @see Screen::docScreenImageProgress()
     */
    public function docScreenImageProgress(): ScreenImageProgress|null
    {
        return ScreenImageProgress::Unnecessary;
    }
}
