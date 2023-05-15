<?php

namespace App\Management\Screens\Login;

use App\Management\Enums\Worker;
use App\Management\Screens\Enums\BetaViewProgress;
use App\Management\Screens\Enums\ScreenCategory;
use App\Management\Screens\Enums\ScreenImageProgress;
use App\Management\Screens\Screen;

/**
 * パスワードの再設定画面
 *
 * 画面イメージ：https://xd.adobe.com/view/d6ac4f98-51d2-407a-b102-2dd26be626a2-83ff/
 */
class PasswordResetScreen extends Screen
{
    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 103;
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
        return 'パスワードの再設定';
    }

    /**
     * @see Screen::docRemarks()
     */
    public function docRemarks(): string|null
    {
        return 'パスワードの再設定用メールなどを受け取った後に、実際にパスワードを再設定するための操作をする画面。';
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
     * ドキュメント用:β版のViewの担当者
     *
     * @return Worker|null
     */
    public function docBetaViewInCharge(): Worker|null
    {
        return Worker::AvanteSong;
    }

    /**
     * @see Screen:docScreenImageUrl()
     */
    public function docScreenImageUrl(): string|null
    {
        return 'https://xd.adobe.com/view/d6ac4f98-51d2-407a-b102-2dd26be626a2-83ff/';
    }

    /**
     * パスワード再設定フォーム
     */
    public function passwordResetForm()
    {
        //新規パスワードを入力するフォームを表示

        // @todo パスワード再設定のAPIを作成する
    }

    /**
     * パスワード再設定完了画面
     */
    public function passwordResetCompletionScreen()
    {
        //パスワード再設定完了後、パスワード設定完了メッセージとログイン画面への遷移ボタンを表示する
    }

}
