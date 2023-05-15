<?php

namespace App\Management\Screens\Billing;

use App\Management\Enums\Priority;
use App\Management\Enums\Worker;
use App\Management\Screens\Enums\BetaViewProgress;
use App\Management\Screens\Enums\ScreenCategory;
use App\Management\Screens\Enums\ScreenImageProgress;
use App\Management\Screens\Screen;

/**
 * 請求一覧画面
 * 
 * 画面イメージ:https://xd.adobe.com/view/aaf2d997-9182-4561-b027-a6a21bc45b01-ffa1/
 */
class BillingListScreen extends Screen
{
    /**
     * @see Screen::docIdWhenDefiningRequirements()
     */
    public function docIdWhenDefiningRequirements(): int|null
    {
        return 65;
    }

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 701;
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
        return '請求一覧';
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
        return 'https://xd.adobe.com/view/aaf2d997-9182-4561-b027-a6a21bc45b01-ffa1/';
    }

}
