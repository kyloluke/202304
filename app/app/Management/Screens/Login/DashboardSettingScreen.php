<?php

namespace App\Management\Screens\Login;

use App\Management\Screens\Enums\ScreenCategory;
use App\Management\Screens\Screen;

/**
 * ダッシュボード表示設定画面
 */
class DashboardSettingScreen extends Screen
{
    /**
     * @see Screen::docIdWhenDefiningRequirements()
     */
    public function docIdWhenDefiningRequirements(): int|null
    {
        return 5;
    }

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 106;
    }

    /**
     * @see Screen::docScreenCategory()
     */
    public function docScreenCategory(): ScreenCategory|null
    {
        return ScreenCategory::Login;
    }

    /**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return 'ダッシュボード表示設定';
    }
}
