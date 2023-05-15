<?php

namespace App\Management\Screens\Chassis;

use App\Management\Enums\Priority;
use App\Management\Enums\Worker;
use App\Management\Screens\Enums\BetaViewProgress;
use App\Management\Screens\Enums\ScreenCategory;
use App\Management\Screens\Enums\ScreenImageProgress;
use App\Management\Screens\Screen;

/**
 * 車輌CSV取込画面
 */
class ChassisCsvImportScreen extends Screen
{
    /**
     * @see Screen::docIdWhenDefiningRequirements()
     */
    public function docIdWhenDefiningRequirements(): int|null
    {
        return 8;
    }

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 204;
    }

    /**
     * @see Screen::docScreenCategory()
     */
    public function docScreenCategory(): ScreenCategory|null
    {
        return ScreenCategory::Chassis;
    }

    /**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return '車輌のCSV取込';
    }

    /**
     * @see Screen::docRemarks()
     */
    public function docRemarks(): string|null
    {
        return <<<END
ガイドメッセージ＋CSVのテンプレートのダウンロードリンクを追加する。
END;
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
        //ガイドメッセージ＋テンプレートのダウンロードリンクを追加する
        //画面イメージの作成の担当:AVANTE佐藤ちひろ
        return Priority::High;
    }

    /**
     * @see Screen::docBetaViewPriority()
     */
    public function docBetaViewProgress(): BetaViewProgress|null
    {
        return BetaViewProgress::Creating;
    }

    /**
     * ドキュメント用:β版のViewの担当者
     *
     * @return Worker|null
     */
    public function docBetaViewInCharge(): Worker|null
    {
        return Worker::AvanteHara;
    }

    /**
     * @see Screen::docBetaViewScheduledCompletionDate()
     */
    public function docBetaViewScheduledCompletionDate(): string|null
    {
        // 仮置き
        return '2023/04/21';
    }
}
