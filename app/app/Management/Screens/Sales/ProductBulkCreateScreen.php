<?php

namespace App\Management\Screens\Sales;

use App\Management\Screens\Enums\ScreenCategory;
use App\Management\Screens\Screen;

/**
 * サービス一括登録画面
 */
class ProductBulkCreateScreen extends Screen
{
    /**
     * @see Screen::docIdWhenDefiningRequirements()
     */
    public function docIdWhenDefiningRequirements(): int|null
    {
        return 113;
    }

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 807;
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
        return 'サービスの一括作成';
    }
}
