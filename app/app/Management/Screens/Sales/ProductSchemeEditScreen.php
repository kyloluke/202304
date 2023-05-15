<?php

namespace App\Management\Screens\Sales;

use App\Management\Enums\Priority;
use App\Management\Enums\Worker;
use App\Management\Screens\Enums\BetaViewProgress;
use App\Management\Screens\Enums\ScreenCategory;
use App\Management\Screens\Enums\ScreenImageProgress;
use App\Management\Screens\Screen;

/**
 * 商品スキームの編集画面
 *
 * 画面イメージ: https://xd.adobe.com/view/ef878b3e-e713-4c86-b14f-d8e11431be00-bad4/screen/1b250b6f-a619-4b54-a89d-38947fd6a103
 */
class ProductSchemeEditScreen extends Screen
{
    /**
     * @see Screen::docIdWhenDefiningRequirements()
     */
    public function docIdWhenDefiningRequirements(): int|null
    {
        return 118;
    }

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 802;
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
        return 'サービス基本情報の編集';
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
        return Worker::CreerKawano;
    }

    /**
     * @see Screen::docBetaViewScheduledCompletionDate()
     */
    public function docBetaViewScheduledCompletionDate(): string|null
    {
        // 仮置き
        return '2023/04/28';
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
        return 'https://xd.adobe.com/view/ef878b3e-e713-4c86-b14f-d8e11431be00-bad4/screen/1b250b6f-a619-4b54-a89d-38947fd6a103';
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

    /**
     * 削除
     *
     * @return bool
     */
    public function delete(): bool
    {
        return false;
    }
}
