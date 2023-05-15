<?php

namespace App\Management\Screens\Chassis;

use App\Management\Enums\Worker;
use App\Management\Screens\Enums\ScreenCategory;
use App\Management\Screens\Enums\ScreenImageProgress;
use App\Management\Screens\Screen;

/**
 * 車輌WEB共有画面
 * 画面イメージ：https://xd.adobe.com/view/c8efb654-675f-417c-9285-df4264725ced-9dbc/screen/e9a7aedf-3dad-49a1-933f-d2b5eb6e95f2/
 */
class ChassisShareScreen extends Screen
{
    /**
     * @see Screen::docIdWhenDefiningRequirements()
     */
    public function docIdWhenDefiningRequirements(): int|null
    {
        return 23;
    }

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 216;
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
        return '車輌のWEB共有';
    }

    /**
     * @see Screen::docScreenImageProgress()
     */
    public function docScreenImageProgress(): ScreenImageProgress|null
    {
        return parent::docScreenImageProgress();
    }

    /**
     * @see Screen::docScreenImageInCharge()
     */
    public function docScreenImageInCharge(): Worker|null
    {
        return parent::docScreenImageInCharge();
    }

    /**
     * 共有する画面の選択
     */
    public function selectShareScreen()
    {
        //以下より共有する画面を選択する。複数選択可能
        //・詳細情報
        //・車輛写真
        //・書類

    }

    /**
     * 車輛の詳細閲覧
     */
    public function chassisDatailView()
    {
        //SYNCのみ知りえる情報を除き、車輛の情報はすべて共有
        //車輛詳細、輸出前検査タブ、YARD搬入・搬出タブを共有
    }
    
    /**
     * 車輛の写真閲覧
     */
    public function chassisPhotoView()
    {
        //車輌の写真を共有する
        //ダウンロード機能は優先度：低
        //写真タブを共有
    }

    /**
     * 車輛の書類閲覧
     */
    public function chassisDocumentView()
    {
        //車輌の書類を共有する
        //プレビューの閲覧・ダウンロードが可能
        //書類タブを共有
    }

}
