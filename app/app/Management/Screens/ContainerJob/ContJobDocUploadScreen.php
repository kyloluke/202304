<?php

namespace App\Management\Screens\ContainerJob;

use App\Management\Enums\Worker;
use App\Management\Screens\Enums\BetaViewProgress;
use App\Management\Screens\Enums\ScreenCategory;
use App\Management\Screens\Enums\ScreenImageProgress;
use App\Management\Screens\Screen;

/**
 * コンテナ一JOB書類アップロード画面
 */
class ContJobDocUploadScreen extends Screen
{
    /**
     * @see Screen::docIdWhenDefiningRequirements()
     */
    public function docIdWhenDefiningRequirements(): int|null
    {
        return 30;
    }

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 407;
    }

    /**
     * @see Screen::docScreenCategory()
     */
    public function docScreenCategory(): ScreenCategory|null
    {
        return ScreenCategory::ContainerJob;
    }

    /**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return 'コンテナJOBの書類アップロード';
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

    /**
     * 通知の送信先を選択する
     */
    public function selectMailRecipient()
    {
        //通知の送信先をメールアドレスではなくユーザー名から選択;

    }

    /**
     * 輸出キャンセル時の取止書の扱い
     */
    public function jobCancelDocument()
    {
        //輸出許可証が発行された後に輸出がキャンセルになった場合、外貨になった貨物を国内貨物に戻すため取止書が発行される
        //既定のフローには組み込んでいないが、LP2では各個人の判断で種別をEDとしてアップロードしており、LP3でも同じ対応でOK
    }
    
}
