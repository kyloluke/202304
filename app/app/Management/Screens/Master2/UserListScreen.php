<?php

namespace App\Management\Screens\Master2;

use App\Management\Enums\Worker;
use App\Management\Screens\Enums\ScreenCategory;
use App\Management\Screens\Enums\ScreenImageProgress;
use App\Management\Screens\Screen;

/**
 * ユーザー一覧画面
 */
class UserListScreen extends Screen
{
    /**
     * @see Screen::docIdWhenDefiningRequirements()
     */
    public function docIdWhenDefiningRequirements(): int|null
    {
        return 98;
    }

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 1003;
    }

    /**
     * @see Screen::docScreenCategory()
     */
    public function docScreenCategory(): ScreenCategory|null
    {
        return ScreenCategory::Master2;
    }

    /**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return 'ユーザーの一覧';
    }

    /**
     * @see Screen::docScreenImageProgress()
     */
    public function docScreenImageProgress(): ScreenImageProgress|null
    {
        return ScreenImageProgress::NotCreated;
    }

    /**
     * @see Screen::docScreenImageInCharge()
     */
    public function docScreenImageInCharge(): Worker|null
    {
        return Worker::AvanteSato;
    }
}
