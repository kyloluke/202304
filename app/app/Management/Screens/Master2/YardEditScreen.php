<?php

namespace App\Management\Screens\Master2;

use App\Management\Enums\Priority;
use App\Management\Enums\Worker;
use App\Management\Screens\Enums\BetaViewProgress;
use App\Management\Screens\Enums\ScreenCategory;
use App\Management\Screens\Enums\ScreenImageProgress;
use App\Management\Screens\Screen;

/**
 * ヤード編集画面
 *
 * 画面イメージ:https://xd.adobe.com/view/9d356745-cff9-43bb-9ca6-a43952f85f8f-c866/screen/7d194487-a870-487b-b0ba-47363befb703/
 */
class YardEditScreen extends Screen
{
    /**
     * @see Screen::docIdWhenDefiningRequirements()
     */
    public function docIdWhenDefiningRequirements(): int|null
    {
        return 77;
    }

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 1007;
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
        return 'ヤードの編集';
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
        return 'https://xd.adobe.com/view/9d356745-cff9-43bb-9ca6-a43952f85f8f-c866/screen/7d194487-a870-487b-b0ba-47363befb703/';
    }

    /**
     * 同一グループ化にするヤードの選択
     */
    public function selectGroupingYard()
    {
        //同一グループ化するYARDを選択する
        //ヤードグループの名前は代表ヤードの名前をデフォルトとし、ヤードグループ編集画面で編集可能にする
        //以下グループ共通の設定項目はヤードグループ編集画面からのみ編集可能になる
        //・デフォルト積港
        //・SYNC担当者
        //・通関業者
        //・船積み作業会社
        //・在庫管理会社
        //・蔵主
        //・ドレー業者
    }

    /**
     * ヤード休日設定
     */
    public function EditYardHoliday()
    {
        //例外的なスケジュール設定の履歴は年単位の表示でOK
        //例外的なスケジュールの設定で休業日・営業日設定の日付が被った場合にはエラーを出す
        //ex)2023/01/01～2023/01/04を休日にする設定と2023/01/02を営業日にするような設定をした場合はエラーを出す
        //他のヤードと同一グループ化した場合、休日設定はグループ内共通になるのでヤードグループの編集画面からのみ編集可能になる
    }

    /**
     * ヤード搬入受付時間
     */
    public function yardCarryInEeception()
    {
        //搬入受付時間は一旦非表示扱いにする。DBとしては持っておく
    }

    /**
     * 荷主自社YARD
     */
    public function shipperOwnYard()
    {
        //OSLに置き換わるためLP3では削除
    }
}
