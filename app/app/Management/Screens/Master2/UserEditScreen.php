<?php

namespace App\Management\Screens\Master2;

use App\Management\Enums\Worker;
use App\Management\Screens\Enums\ScreenCategory;
use App\Management\Screens\Enums\ScreenImageProgress;
use App\Management\Screens\Screen;

/**
 * ユーザー編集画面
 */
class UserEditScreen extends Screen
{
    /**
     * @see Screen::docIdWhenDefiningRequirements()
     */
    public function docIdWhenDefiningRequirements(): int|null
    {
        return 100;
    }

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 1004;
    }

    /**
     * @see Screen::docScreenCategory()
     */
    public function docScreenCategory(): ScreenCategory|null
    {
        return ScreenCategory::Master2;
    }

    /**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return 'ユーザーの編集';
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
     * 通知内容設定
     */
    public function noticeEdit()
    {
        //LP2にあった「D/R自動送信」「S/O自動送信」「ED自動送信」の設定はLP3ではマイページの通知内容設定に移行する
        //通知内容は本人以外編集できない権限設定のため、ユーザーマスタページでの編集は不可
    }
}
