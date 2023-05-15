<?php

namespace App\Management\Screens\Master;

use App\Management\Screens\Enums\ScreenCategory;
use App\Management\Screens\Enums\ScreenImageProgress;
use App\Management\Screens\Screen;

/**
 * 自動車ブランド一覧画面
 *
 * 画面イメージ:https://xd.adobe.com/view/065f03ae-d725-4256-be70-569390dd7cb0-530c/
 */
class CarBrandListScreen extends Screen
{
    /**
     * @see Screen::docIdWhenDefiningRequirements()
     */
    public function docIdWhenDefiningRequirements(): int|null
    {
        return 89;
    }

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 906;
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
        return '自動車ブランドの一覧';
    }

    /**
     * @see Screen::docScreenImageProgress()
     */
    public function docScreenImageProgress(): ScreenImageProgress|null
    {
        return ScreenImageProgress::Unnecessary;
    }

    /**
     * @see Screen:docScreenImageUrl()
     */
    public function docScreenImageUrl(): string|null
    {
        return 'https://xd.adobe.com/view/065f03ae-d725-4256-be70-569390dd7cb0-530c/';
    }
}
