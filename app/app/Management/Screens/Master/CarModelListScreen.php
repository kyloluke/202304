<?php

namespace App\Management\Screens\Master;

use App\Management\Enums\Worker;
use App\Management\Screens\Enums\ScreenCategory;
use App\Management\Screens\Enums\ScreenImageProgress;
use App\Management\Screens\Screen;

/**
 * 車種一覧画面
 */
class CarModelListScreen extends Screen
{
    /**
     * @see Screen::docIdWhenDefiningRequirements()
     */
    public function docIdWhenDefiningRequirements(): int|null
    {
        return 91;
    }

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 907;
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
        return '車種の一覧';
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

    /**
     * 検索
     *
     * @return bool
     */
    public function search(): bool
    {
        return false;
    }

    /**
     * 作成
     *
     * @return bool
     */
    public function create(): bool
    {
        return false;
    }

    /**
     * 更新
     *
     * @return bool
     */
    public function update(): bool
    {
        return false;
    }

    /**
     * 削除
     *
     * @return bool
     */
    public function delete(): bool
    {
        return false;
    }

    /**
     * CSVをダウンロードする
     *
     * @return bool
     */
    public function downloadCsv(): bool
    {
        return false;
    }
}
