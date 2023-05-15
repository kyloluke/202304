<?php

namespace App\Management\Screens\ShipSchedule;

use App\Management\Enums\Worker;
use App\Management\Screens\Enums\BetaViewProgress;
use App\Management\Screens\Enums\ScreenCategory;
use App\Management\Screens\Enums\ScreenImageProgress;
use App\Management\Screens\Screen;

/**
 * コンテナ船スケジュール一覧画面
 *
 * 画面イメージ: https://xd.adobe.com/view/0b2f846f-5d11-416e-a70c-dfa80441a51e-5e7c/
 */
class ContShipScheduleListScreen extends Screen
{
    //LP2のコンテナ船スケジュール一覧画面にあった「オーシャン・スケジュール」のボタンは削除する。
    //INTTRAのデータの取り込みは1日2回のバックグラウンド処理でやっていれば十分なことと、近い将来廃止する可能性が高い機能であることから。

    /**
     * @see Screen::docIdWhenDefiningRequirements()
     */
    public function docIdWhenDefiningRequirements(): int|null
    {
        return 52;
    }

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 301;
    }

    /**
     * @see Screen::docScreenCategory()
     */
    public function docScreenCategory(): ScreenCategory|null
    {
        return ScreenCategory::ShipSchedule;
    }

    /**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return 'コンテナ船のスケジュール管理一覧';
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
        return parent::docBetaViewProgress();
    }

    /**
     * @see Screen::docBetaViewInCharge()
     */
    public function docBetaViewInCharge(): Worker|null
    {
        return parent::docBetaViewInCharge();
    }

    /**
     * @see Screen:docScreenImageUrl()
     */
    public function docScreenImageUrl(): string|null
    {
        return 'https://xd.adobe.com/view/0b2f846f-5d11-416e-a70c-dfa80441a51e-5e7c/';
    }

    /**
     * 検索
     *
     * @return bool
     */
    public function search(): bool
    {
        return false;
    }

    /**
     * コンテナ船スケジュール一覧のヘッダー
     */
    public function contShipScheduleListHeader()
    {
        //LP2の画面にあった、ヘッダーの「船種」は表題と同じことを指しているので削除
        //また、ヘッダーの「備考」についても削除
    }
}
