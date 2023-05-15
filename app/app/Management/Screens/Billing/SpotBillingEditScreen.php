<?php

namespace App\Management\Screens\Billing;

use App\Management\Enums\Priority;
use App\Management\Enums\Worker;
use App\Management\Screens\Enums\BetaViewProgress;
use App\Management\Screens\Enums\ScreenCategory;
use App\Management\Screens\Enums\ScreenImageProgress;
use App\Management\Screens\Screen;

/**
 * スポット請求編集画面
 * 
 * 画面イメージ：https://xd.adobe.com/view/aaf2d997-9182-4561-b027-a6a21bc45b01-ffa1/screen/4c337f94-1182-430a-a5af-2e6e6b3051f5/
 */
class SpotBillingEditScreen extends Screen
{
    /**
     * @see Screen::docIdWhenDefiningRequirements()
     */
    public function docIdWhenDefiningRequirements(): int|null
    {
        return 71;
    }

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 705;
    }

    /**
     * @see Screen::docScreenCategory()
     */
    public function docScreenCategory(): ScreenCategory|null
    {
        return ScreenCategory::Billing;
    }

    /**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return 'スポット請求の編集';
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
        return BetaViewProgress::NotCreated;
    }

    /**
     * @see Screen::docBetaViewInCharge()
     */
    public function docBetaViewInCharge(): Worker|null
    {
        return Worker::AvanteFujisaki;
    }

    /**
     * @see Screen::docBetaViewScheduledCompletionDate()
     */
    public function docBetaViewScheduledCompletionDate(): string|null
    {
        return '2023/05/12';
    }

    /**
     * @see Screen:docScreenImageUrl()
     */
    public function docScreenImageUrl(): string|null
    {
        return 'https://xd.adobe.com/view/aaf2d997-9182-4561-b027-a6a21bc45b01-ffa1/screen/4c337f94-1182-430a-a5af-2e6e6b3051f5/';
    }

    /**
     * 為替RATEの編集
     */
    public function exchangeRateEdit()
    {
        //LP2では明細ごとにRATEを設定できていたが、LP3からは請求書発行時点のRATEでいいため明細ごとのRATE設定は廃止
    }
}
