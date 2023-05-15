<?php

namespace App\Management\Screens\RoroJob;

use App\Management\Screens\Enums\ScreenCategory;
use App\Management\Screens\Screen;

/**
 * ROROJOBWEB共有画面
 */
class RoroJobShareScreen extends Screen
{
    /**
     * @see Screen::docIdWhenDefiningRequirements()
     */
    public function docIdWhenDefiningRequirements(): int|null
    {
        return 51;
    }

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 511;
    }

    /**
     * @see Screen::docScreenCategory()
     */
    public function docScreenCategory(): ScreenCategory|null
    {
        return ScreenCategory::RoroJob;
    }

    /**
     * @see Screen::docName()
     */
    public function docName(): string|null
    {
        return 'ROROJOBのWEB共有画面';
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
     * ROROJOBの詳細閲覧
     */
    public function roroJobDatailView()
    {
        //SYNCのみ知りえる情報を除き、車輛の情報はすべて共有
        //ROROJOB詳細、船積車輛(車輛写真へのリンクを除く)タブを共有
    }
    
    /**
     * ROROJOBの車輛の写真閲覧
     */
    public function roroJobPhotoView()
    {
        //車輌の写真を共有する
        //ダウンロード機能は優先度：低
        //船積車輛タブを共有
    }

    /**
     * ROROJOBの書類閲覧
     */
    public function roroJobDocumentView()
    {
        //ROROJOBの書類を共有する
        //プレビューの閲覧・ダウンロードが可能
        //書類タブを共有
    }
}
