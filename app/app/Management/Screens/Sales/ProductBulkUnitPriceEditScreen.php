<?php

namespace App\Management\Screens\Sales;

use App\Management\Screens\Enums\ScreenCategory;
use App\Management\Screens\Screen;

/**
 * サービス一括単価編集画面 aka.サービス作成（定価）（一括登録）
 */
class ProductBulkUnitPriceEditScreen extends Screen
{
    /**
     * @see Screen::docIdWhenDefiningRequirements()
     */
    public function docIdWhenDefiningRequirements(): int|null
    {
        return 114;
    }

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 809;
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
        return 'サービスの一括単価編集';
    }
}
