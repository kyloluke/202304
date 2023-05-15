<?php

namespace App\Management\Screens\ShipSchedule;

use App\Management\Enums\Priority;
use App\Management\Enums\Worker;
use App\Management\Models\RoroShipScheduleItem;
use App\Management\Screens\Enums\BetaViewProgress;
use App\Management\Screens\Enums\ScreenCategory;
use App\Management\Screens\Enums\ScreenImageProgress;
use App\Management\Screens\Screen;

/**
 * RORO船スケジュール編集画面
 *
 * 画面イメージ：https://xd.adobe.com/view/18bbe21a-d13e-47bc-8774-2efd87de4547-4de8/
 */
class RoroShipScheduleEditScreen extends Screen
{
    /**
     * @see Screen::docIdWhenDefiningRequirements()
     */
    public function docIdWhenDefiningRequirements(): int|null
    {
        return 62;
    }

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 308;
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
        return 'RORO船のスケジュール編集';
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
        return parent::docBetaViewProgress();
    }

    /**
     * @see Screen::docBetaViewInCharge()
     */
    public function docBetaViewInCharge(): Worker|null
    {
        return Worker::AvanteFujisaki;
    }

    /**
     * @see Screen::docBetaViewScheduledCompletionDate()
     */
    public function docBetaViewScheduledCompletionDate(): string|null
    {
        return '2023/04/21';
    }

    /**
     * @see Screen:docScreenImageUrl()
     */
    public function docScreenImageUrl(): string|null
    {
        return 'https://xd.adobe.com/view/18bbe21a-d13e-47bc-8774-2efd87de4547-4de8/';
    }

    /**
     * 作成モード
     *
     * @return bool
     */
    public function createMode(): bool
    {
        return false;
    }

    /**
     * 更新モード
     *
     * @return bool
     */
    public function updateMode(): bool
    {
        return false;
    }

    /**
     * 削除
     *
     * @return bool
     */
    public function delete(): bool
    {
        //更新モードの場合は、削除の操作が出来るようにする
        return true;
    }

    /**
     * 積地のスケジュール
     */
    public function polSchedule()
    {
        //入力項目に「GoDown日」「GoDown場所」を追加
        //以前LP2にあった項目で、LP3で復活させる
        //ROROJOBと紐づいた場合は、ここで設定した値をROROJOBから参照する
        $item = new RoroShipScheduleItem();
        $item->goDownAt;
        $item->goDownDestination;
    }

    /**
     * 積地のスケジュールのソート
     */
    public function polScheduleSort()
    {
        //出港予定日を基準に並び替える。出港予定日が空白のものがある場合は、出港予定日が入力されているもののみ並び替える。
        //出港予定日が同日の積地がある場合、アルファベット順にするなど一定のルールで並び替える。
        //中国行きの船の場合は港が東から西にある順にする、といった地理の概念は無視して良い。
    }

    /**
     * 揚地のスケジュールのソート
     */
    public function podScheduleSort()
    {
        //入港予定日を基準に並び替える。入港予定日が空白のものがある場合は、入港予定日が入力されているもののみ並び替える。
        //入港予定日が同日の揚地がある場合、アルファベット順にするなど一定のルールで並び替える。
        //日本→中国→アフリカに行く船の場合は港が日か死から西にある順にする、といった地理の概念は無視して良い。
    }

    /**
     * 更新理由
     */
    public function reasonForUpdate()
    {
        //更新時は更新理由を記入する欄を有効にし、必須入力とする
        //更新理由以外に入力するような備考はないため、別途備考欄は作らない
    }
}
