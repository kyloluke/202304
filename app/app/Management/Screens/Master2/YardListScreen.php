<?php

namespace App\Management\Screens\Master2;

use App\Management\Enums\Priority;
use App\Management\Enums\Worker;
use App\Management\Screens\Enums\BetaViewProgress;
use App\Management\Screens\Enums\ScreenCategory;
use App\Management\Screens\Enums\ScreenImageProgress;
use App\Management\Screens\Screen;

/**
 * ヤード一覧画面
 *
 * 画面イメージ:https://xd.adobe.com/view/9d356745-cff9-43bb-9ca6-a43952f85f8f-c866/
 *
 * ヤードグループの一覧画面は作成しない。
 * ヤードの一覧画面の中でヤードグル―プ、ヤードの両方を表示する。
 */
class YardListScreen extends Screen
{
    /**
     * @see Screen::docIdWhenDefiningRequirements()
     */
    public function docIdWhenDefiningRequirements(): int|null
    {
        return 75;
    }

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 1005;
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
        return 'ヤードの一覧';
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
        return BetaViewProgress::NotCreated;
    }

    /**
     * @see Screen::docBetaViewInCharge()
     */
    public function docBetaViewInCharge(): Worker|null
    {
        return Worker::AvanteSong;
    }

    /**
     * @see Screen::docBetaViewScheduledCompletionDate()
     */
    public function docBetaViewScheduledCompletionDate(): string|null
    {
        // 仮置き
        return '2023/04/28';
    }

    /**
     * @see Screen:docScreenImageUrl()
     */
    public function docScreenImageUrl(): string|null
    {
        return 'https://xd.adobe.com/view/9d356745-cff9-43bb-9ca6-a43952f85f8f-c866/';
    }

    /**
     * 一覧表示
     *
     * @reutrn bool
     */
    public function viewList(): bool
    {
        //ヤードグル―プ、ヤードの両方を一覧に表示する。

        //LP2のヤード一覧画面にあった、ヤードのIDのリンクは廃止する。
        //LP3ではヤードの名前をリンクにし、詳細画面に移動できるようにする。
        //また、LP2のヤード一覧画面にあった、車輌一覧画面へのリンク(検索条件に指定したヤードを指定するパラメータ付き)も廃止する。

        return false;
    }
}
