<?php

namespace App\Management\Screens\Misc;

use App\Management\Screens\Enums\ScreenCategory;
use App\Management\Screens\Screen;

/**
 * OSL画面チェンジ（仮称）画面
 */
class OslModeSwitchScreen extends Screen
{
    /**
     * @see Screen::docIdWhenDefiningRequirements()
     */
    public function docIdWhenDefiningRequirements(): int|null
    {
        return 128;
    }

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 1203;
    }

    /**
     * @see Screen::docScreenCategory()
     */
    public function docScreenCategory(): ScreenCategory|null
    {
        return ScreenCategory::Misc;
    }

    /**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return 'OSL画面チェンジ（仮称）';
    }
}
