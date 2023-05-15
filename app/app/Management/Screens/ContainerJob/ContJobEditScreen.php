<?php

namespace App\Management\Screens\ContainerJob;

use App\Management\Enums\Priority;
use App\Management\Enums\Worker;
use App\Management\Screens\Enums\BetaViewProgress;
use App\Management\Screens\Enums\ScreenCategory;
use App\Management\Screens\Enums\ScreenImageProgress;
use App\Management\Screens\Screen;

/**
 * コンテナJOB編集画面
 */
class ContJobEditScreen extends Screen
{
    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 409;
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
        return 'コンテナJOBの編集画面';
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
     * @see Screen::docBetaViewInCharge()
     */
    public function docBetaViewInCharge(): Worker|null
    {
        return Worker::AvanteFujisaki;
    }

    /**
     * 輸出前検査種別
     */
    public function preExportInspection()
    {
        //入力項目に「輸出前検査種別」を追加し、車輌が受ける必要がある輸出前検査を選択できるようにする(複数選択可)
        //仕向地(仕向地が選択されていない場合は揚地)の所在国に応じた輸出前検査種別を取得し、その中から本JOBではどの輸出前検査を受ける必要があるのかをユーザーに選択させる
    }

    /**
     * 複数SHIPPERの対応
     */
    public function multipleShipper()
    {
        //複数SHIPPERに対応する必要がある。以下の内容がSHIPPERごとに異なる。
        //・SHIPPER
        //・扱い業者
        //・備考　全関係者
        //・混載貨物
        //・必要書類
    }
}
