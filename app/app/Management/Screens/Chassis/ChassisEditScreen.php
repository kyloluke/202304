<?php

namespace App\Management\Screens\Chassis;

use App\Management\Enums\Priority;
use App\Management\Enums\Worker;
use App\Management\Screens\Enums\BetaViewProgress;
use App\Management\Screens\Enums\ScreenCategory;
use App\Management\Screens\Enums\ScreenImageProgress;
use App\Management\Screens\Screen;

/**
 * 車輌編集画面 aka.車輌登録・編集
 */
class ChassisEditScreen extends Screen
{
    /**
     * @see Screen::docIdWhenDefiningRequirements()
     */
    public function docIdWhenDefiningRequirements(): int|null
    {
        return 17;
    }

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 212;
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
        return '車輌の編集';
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
     * ドキュメント用:β版のViewの担当者
     *
     * @return Worker|null
     */
    public function docBetaViewInCharge(): Worker|null
    {
        return Worker::AvanteHara;
    }

    /**
     * @see Screen::docBetaFeaturePriority()
     */
    public function docBetaFeaturePriority(): Priority
    {
        return Priority::High;
    }

    /**
     * 作成モード
     */
    public function createMode(): void
    {

    }

    /**
     * 更新モード
     */
    public function updateMode(): void
    {

    }

    /**
     * 重量の編集
     * @return void
     */
    public function editWeight(): void
    {

    }

    /**
     * カスタムラベルの編集
     * @return void
     */
    public function editCustomLabel(): void
    {
        //通常モードの場合はカスタムラベルの編集は不要
        //OSLモードの場合はカスタムラベルの編集が必要
    }

    /**
     * 連続作成
     * @note 機能一覧のNo.11のメモ：・連続登録機能
     */
    public function createInSuccession(): void
    {

    }

    /**
     * 削除
     */
    public function delete(): void
    {

    }

    /**
     * その他請求明細の編集
     */
    public function editOtherBillingItems(): void
    {

    }
}
