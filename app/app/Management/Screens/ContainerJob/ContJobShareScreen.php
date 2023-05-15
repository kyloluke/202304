<?php

namespace App\Management\Screens\ContainerJob;

use App\Management\Screens\Enums\ScreenCategory;
use App\Management\Screens\Screen;

/**
 * コンテナ一JOBWEB共有画面
 * 画面イメージ:https://xd.adobe.com/view/4cbb3daf-7c77-4424-a201-a69f13f7d5e0-19e8/screen/e973b5fa-5fd6-47c7-aa2a-1eae3b5599cd
 */
class ContJobShareScreen extends Screen
{
    /**
     * @see Screen::docIdWhenDefiningRequirements()
     */
    public function docIdWhenDefiningRequirements(): int|null
    {
        return 37;
    }

    /**
     * @see Screen::docId()
     */
    public function docId(): int|null
    {
        return 411;
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
        return 'コンテナJOBのWEB共有画面';
    }

    /**
     * 共有する画面の選択
     */
    public function selectShareScreen()
    {
        //SHIPPERが複数いる場合でも、共有は1コンテナ単位なのでSHIPPERごとの情報もすべて閲覧できる
        //以下より共有する画面を選択する。複数選択可能
        //・詳細情報
        //・写真(コンテナ写真・車輛写真)
        //・書類

    }

    /**
     * コンテナJOBの詳細閲覧
     */
    public function contJobDatailView()
    {
        //SYNCのみ知りえる情報を除き、コンテナJOBの情報はすべて共有
        //コンテナJOB詳細、船積車輛(車輛写真へのリンクを除く)タブを共有
    }

    /**
     * コンテナJOBの写真閲覧
     */
    public function contJobPhotoView()
    {
        //コンテナ写真と車輛の写真を共有
        //ダウンロード機能は優先度：低
        //コンテナ写真・船積車輛タブを共有
    }

    /**
     * コンテナJOBの書類閲覧
     */
    public function chassisDocumentView()
    {
        //コンテナJOBの書類を共有する
        //プレビューの閲覧・ダウンロードが可能
        //書類タブを共有
    }
}
