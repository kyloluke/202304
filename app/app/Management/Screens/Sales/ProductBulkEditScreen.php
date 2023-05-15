<?php

namespace App\Management\Screens\Sales;

use App\Management\Screens\Enums\ScreenCategory;
use App\Management\Screens\Screen;

/**
 * サービス一括編集画面
 */
class ProductBulkEditScreen extends Screen
{
    /**
     * @see Screen::docIdWhenDefiningRequirements()
     */
    public function docIdWhenDefiningRequirements(): int|null
    {
        return 115;
    }

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 808;
    }

    /**
     * @see Screen::docScreenCategory()
     */
    public function docScreenCategory(): ScreenCategory|null
    {
        return ScreenCategory::Sales;
    }

    /**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return 'サービスの一括編集';
    }
}
