<?php

namespace App\Management\Screens\Sales;

use App\Management\Enums\Priority;
use App\Management\Enums\Worker;
use App\Management\Screens\Enums\BetaViewProgress;
use App\Management\Screens\Enums\ScreenCategory;
use App\Management\Screens\Enums\ScreenImageProgress;
use App\Management\Screens\Screen;

/**
 * 見積編集画面
 *
 * 画面イメージ: https://xd.adobe.com/view/e5299650-ea27-45c4-96e9-2e7f73fefd49-b07a/screen/6b55f073-c09c-431f-a9df-a442ed38c0d3
 */
class QuotationEditScreen extends Screen
{
    // @todo 荷主が見積もりを確認する画面(=見積の詳細orプレビュー画面?)が必要

    /**
     * @see Screen::docIdWhenDefiningRequirements()
     */
    public function docIdWhenDefiningRequirements(): int|null
    {
        return 107;
    }

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 812;
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
        return '見積の編集';
    }

    /**
     * @see Screen::docScreenImageProgress()
     */
    public function docScreenImageProgress(): ScreenImageProgress|null
    {
        return ScreenImageProgress::Created;
    }

    /**
     * @see Screen::docScreenImageInCharge()
     */
    public function docScreenImageInCharge(): Worker|null
    {
        return Worker::AvanteSato;
    }

    /**
     * @see Screen::docBetaViewPriority()
     */
    public function docBetaViewPriority(): Priority
    {
        return Priority::High;
    }

    /**
     * @see Screen::docBetaViewPriority()
     */
    public function docBetaViewProgress(): BetaViewProgress|null
    {
        return BetaViewProgress::Created;
    }

    /**
     * @see Screen::docBetaViewInCharge()
     */
    public function docBetaViewInCharge(): Worker|null
    {
        return Worker::CreerSato;
    }

    /**
     * @see Screen::docBetaFeaturePriority()
     */
    public function docBetaFeaturePriority(): Priority
    {
        return Priority::High;
    }

    /**
     * @see Screen:docScreenImageUrl()
     */
    public function docScreenImageUrl(): string|null
    {
        return 'https://xd.adobe.com/view/e5299650-ea27-45c4-96e9-2e7f73fefd49-b07a/screen/6b55f073-c09c-431f-a9df-a442ed38c0d3';
    }

    /**
     * 作成モード
     *
     * @return bool
     */
    public function createMode(): bool
    {
        return false;
    }

    /**
     * 更新モード
     *
     * @return bool
     */
    public function updateMode(): bool
    {
        return false;
    }
}
