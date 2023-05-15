<?php

namespace App\Management\Screens\Login;

use App\Management\Enums\Worker;
use App\Management\Screens\Enums\BetaViewProgress;
use App\Management\Screens\Enums\ScreenCategory;
use App\Management\Screens\Enums\ScreenImageProgress;
use App\Management\Screens\Screen;

/**
 * パスワードの再設定リクエスト画面
 *
 * 画面イメージ：https://xd.adobe.com/view/d6ac4f98-51d2-407a-b102-2dd26be626a2-83ff/
 */
class PasswordResetRequestScreen extends Screen
{
    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 102;
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
        return 'パスワードの再設定リクエスト';
    }

    /**
     * @see Screen::docRemarks()
     */
    public function docRemarks(): string|null
    {
        return 'パスワードを忘れてしまったときなどに、パスワードの再設定の手続きをリクエストするための画面';
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
     * パスワードリセット依頼フォーム
     */
    public function passwordResetRequestForm()
    {
        //ユーザーのメールアドレスの登録がある場合：
        //パスワードリセット依頼フォームにメールアドレスまたはユーザーIDを入力して送信 -> ユーザーのメールアドレスあてにパスワード再設定のメールを送信する

        //ユーザーのメールアドレスの登録がない場合：
        //ユーザーIDを入力して送信 -> ユーザーが所属する事業所の管理者に対してパスワードのリセット依頼を通知する

        // @todo パスワードの再設定リクエストのAPIを作成する
    }

}
