<?php

namespace App\Management\Screens\ContainerJob;

use App\Management\Enums\Worker;
use App\Management\Screens\Enums\BetaViewProgress;
use App\Management\Screens\Enums\ScreenCategory;
use App\Management\Screens\Enums\ScreenImageProgress;
use App\Management\Screens\Screen;

/**
 * コンテナJOBの写真一覧画面
 */
class ContainerPhotoScreen extends Screen
{
    /**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return 'コンテナJOBの写真一覧';
    }

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 406;
    }

    /**
     * @see Screen::docScreenCategory()
     */
    public function docScreenCategory(): ScreenCategory|null
    {
        return ScreenCategory::ContainerJob;
    }

    /**
     * @see Screen::docRemarks()
     */
    public function docRemarks(): string|null
    {
        return parent::docRemarks();
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
    public function docBetaViewProgress(): BetaViewProgress|null
    {
        return BetaViewProgress::Created;
    }

    /**
     * @see Screen::docBetaViewInCharge()
     */
    public function docBetaViewInCharge(): Worker|null
    {
        return Worker::AvanteFujisaki;
    }

    public function viewChassisPhoto()
    {
        // 紐づいている車輌の写真を表示する
    }
}
