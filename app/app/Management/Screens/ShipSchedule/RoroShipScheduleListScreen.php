<?php

namespace App\Management\Screens\ShipSchedule;

use App\Management\Enums\Worker;
use App\Management\Screens\Enums\BetaViewProgress;
use App\Management\Screens\Enums\ScreenCategory;
use App\Management\Screens\Enums\ScreenImageProgress;
use App\Management\Screens\Screen;

/**
 * RORO船スケジュール一覧画面
 */
class RoroShipScheduleListScreen extends Screen
{
    //画面イメージ：https://xd.adobe.com/view/18bbe21a-d13e-47bc-8774-2efd87de4547-4de8/

    /**
     * @see Screen::docIdWhenDefiningRequirements()
     */
    public function docIdWhenDefiningRequirements(): int|null
    {
        return 59;
    }

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 306;
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
        return 'RORO船のスケジュール一覧';
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
        return 'https://xd.adobe.com/view/18bbe21a-d13e-47bc-8774-2efd87de4547-4de8/';
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
     * RORO船スケジュール一覧のヘッダー
     */
    public function roroShipScheduleListHeader()
    {
        //LP2の画面にあった、ヘッダーの「船種」は表題と同じことを指しているので削除
        //また、ヘッダーの「備考」についても削除
    }
}
