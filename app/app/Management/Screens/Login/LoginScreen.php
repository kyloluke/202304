<?php

namespace App\Management\Screens\Login;

use App\Management\Enums\Priority;
use App\Management\Enums\Worker;
use App\Management\Screens\Enums\BetaViewProgress;
use App\Management\Screens\Enums\ScreenCategory;
use App\Management\Screens\Enums\ScreenImageProgress;
use App\Management\Screens\Screen;

/**
 * ログイン画面
 *
 * 画面イメージ：https://xd.adobe.com/view/d6ac4f98-51d2-407a-b102-2dd26be626a2-83ff/
 */
class LoginScreen extends Screen
{
    /**
     * @see Screen::docIdWhenDefiningRequirements()
     */
    public function docIdWhenDefiningRequirements(): int|null
    {
        return 1;
    }

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 101;
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
        return 'ログイン';
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
     * ログイン認証画面
     */
    public function loginAuthScreen()
    {
        //「ユーザーIDまたはメールアドレス」と「パスワード」でログイン認証をする
        //パスワードのマスクはユーザーの操作で外せるようにする
    }

    /**
     * 二要素認証画面
     */
    public function twoFactorAuthScreen()
    {
        //二要素認証用確認コードの入力画面を表示する
        //二要素認証が設定されているユーザーに対して送信した二要素認証用確認コードを入力できるようにする
    }

    /**
     * アカウントロック
     */
    public function accountLock()
    {
        //10回以上連続でログインに失敗した場合はアカウントがロックされたことを表示をする。
        //ロックされた画面には「問い合わせ先はSYNCへ」といった情報は掲載しない。
    }

}
