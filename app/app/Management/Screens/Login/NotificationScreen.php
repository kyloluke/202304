<?php

namespace App\Management\Screens\Login;

use App\Management\Enums\Worker;
use App\Management\Screens\Enums\BetaViewProgress;
use App\Management\Screens\Enums\ScreenCategory;
use App\Management\Screens\Enums\ScreenImageProgress;
use App\Management\Screens\Screen;

/**
 * 通知表示画面
 */
class NotificationScreen extends Screen
{
    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 109;
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
        return '通知表示画面';
    }

    /**
     * @see Screen::docRemarks()
     */
    public function docRemarks(): string|null
    {
        return '受け取った通知を表示する画面';
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
        return Worker::Clabel;
    }

    /**
     * @see Screen::docBetaViewProgress()
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
        return Worker::AvanteSong;
    }

    public function Notification()
    {
        //JOB一覧画面の「要確認」タブで出していたアラートや未ダウンロードの書類・写真のNew表記などは通知機能へ移行
        //リリースに間に合わせられるかは要検討
    }
}
