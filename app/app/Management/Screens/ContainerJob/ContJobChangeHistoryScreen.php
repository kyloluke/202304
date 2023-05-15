<?php

namespace App\Management\Screens\ContainerJob;

use App\Management\Screens\Enums\ScreenCategory;
use App\Management\Screens\Screen;

/**
 * コンテナ一JOB変更履歴画面
 */
class ContJobChangeHistoryScreen extends Screen
{
    /**
     * @see Screen::docIdWhenDefiningRequirements()
     */
    public function docIdWhenDefiningRequirements(): int|null
    {
        return 31;
    }

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 410;
    }

    /**
     * @see Screen::docScreenCategory()
     */
    public function docScreenCategory(): ScreenCategory|null
    {
        return ScreenCategory::ContainerJob;
    }

    /**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return 'コンテナJOBの変更履歴';
    }
}
