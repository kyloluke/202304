<?php

namespace App\Management\Screens\Chassis;

use App\Management\Enums\Priority;
use App\Management\Enums\Worker;
use App\Management\Screens\Enums\BetaViewProgress;
use App\Management\Screens\Enums\ScreenCategory;
use App\Management\Screens\Enums\ScreenImageProgress;
use App\Management\Screens\Screen;

/**
 * 車輌写真画面 aka.貨物写真
 *
 * コンテナ写真の画面ではコンテナに紐づいている車両の写真を表示するが、車両写真の画面では車両と紐づいているコンテナ写真を見ることはしない。
 *
 */
class ChassisPhotoScreen extends Screen
{
    /**
     * @see Screen::docIdWhenDefiningRequirements()
     */
    public function docIdWhenDefiningRequirements(): int|null
    {
        return 13;
    }

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 210;
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
        return '車輌の写真';
    }

    /**
     * @see Screen::docRemarks()
     */
    public function docRemarks(): string|null
    {
        return "車輌の一覧画面から写真を表示するときに使用する画面。";
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

    /**
     * @see Screen::docBetaFeaturePriority()
     */
    public function docBetaFeaturePriority(): Priority
    {
        return Priority::High;
    }

    /**
     * @return void
     */
    public function view(): void
    {
        // 車輌の写真を表示する
        //写真は登録時に選択した写真種別「搬入写真」「軽作業」「商品写真」いずれかのタブに表示。「すべて」タブはなくてOK。
    }

    /**
     * DL用写真の保存
     * @return void
     */
    public function resizePhoto(): void
    {
        //DL用のサイズダウンした写真を保存する
    }

    /**
     * DL用写真のダウンロード
     * @return void
     */
    public function downloadPhoto(): void
    {
        //DL用かオリジナルの写真をダウンロードするか選択できる。
        //デフォルトはDL用写真のダウンロード
    }

    /**
     * 車両写真の一括作成(アップロード)
     * @return void
     */
    public function bulkCreate(): void
    {
        // 写真をアップロードしたヤード、写真の種類を設定できる必要がある
        //写真の種類は「写真を追加」ボタンを押したときのタブの種類がデフォルト選択。
        //写真の種類・撮影YARDを一括で設定できる機能を追加。
    }

    /**
     * 車輌写真の一括更新
     * @return bool
     */
    public function bulkUpdate(): bool
    {
        return false;
    }

    /**
     * 写真を回転する
     * @return bool
     */
    public function rotatePhoto(): bool
    {
        //写真の拡大表示・編集画面より設定。回転は90度刻み。
        return false;
    }

    /**
     * 写真一覧の順番の設定
     */
    public function setOrderOfPhotos(): bool
    {
        //「並び替え」ボタン押下で並び替えモードにする。順番の入れ替えはドラッグ＆ドロップで行う。
        return false;
    }

}
