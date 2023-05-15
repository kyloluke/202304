<?php

namespace App\Management\Screens\Master2;

use App\Management\Enums\Priority;
use App\Management\Enums\Worker;
use App\Management\Screens\Enums\BetaViewProgress;
use App\Management\Screens\Enums\ScreenCategory;
use App\Management\Screens\Enums\ScreenImageProgress;
use App\Management\Screens\Screen;

/**
 * ヤードグループ編集画面
 *
 * 画面イメージ:https://xd.adobe.com/view/9d356745-cff9-43bb-9ca6-a43952f85f8f-c866/screen/cb7cbba1-9f2a-4667-8579-ee41e20a56d8/
 */
class YardGroupEditScreen extends Screen
{
    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 1006;
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
        return 'ヤードグループの編集';
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
     * パラメータの入力
     */
    public function inputParams()
    {
        //ヤードグループの以下のパラメータの入力が出来るようにする
        //・名前
    }

    /**
     * デフォルトの積港の選択
     */
    public function selectDefaultLoadPort()
    {
        //ヤードグループのデフォルトの積港を選択できるようにする
    }

    /**
     * 管理者の選択
     */
    public function selectManager()
    {
        //ヤードグループの管理者(=SYNC担当者)を選択できるようにする
    }

    /**
     * デフォルトの業者の選択
     */
    public function selectDefaultMerchants()
    {
        //ヤードグループのデフォルトの業者を選択できるようにする
        //複数選択可能
        //選択できる必要がある業者の種別は以下の5つ
        //・通関業者
        //・船積み作業会社
        //・在庫管理会社
        //・蔵主
        //・ドレー業者
    }

    /**
     * 代表ヤードの選択
     */
    public function selectRepresentativeParentYard()
    {
        //ヤードグループ内での代表のヤードを選択出来るようにする
    }
}
