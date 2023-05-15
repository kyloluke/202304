<?php

namespace App\Management\Functions;

use App\Management\Apis\Lp3Cargo\ChassisUpdatePhotoApi;
use App\Management\Models\ChassisPhoto;
use App\Management\Screens\Chassis\ChassisListScreen;
use App\Management\Screens\Chassis\ChassisPhotoScreen;

/**
 * 業務フロー外(UI)
 */
class MiscUi
{
    /**
     * @return bool
     */
    public function main(): bool
    {
        return $this->restoreDefaultSort() &&
            $this->setColumnVisibility() &&
            $this->rotatePhoto();
    }

    /**
     * デフォルトのソートに戻す
     * @return bool
     */
    public function restoreDefaultSort(): bool
    {
        (new ChassisListScreen())->restoreDefaultSort();

        // @todo コンテナ一覧, RORO一覧, ...も同じようにデフォルトのソートを復元する

        return false;
    }

    /**
     * 列の可視不可視を設定する
     * @return bool
     */
    public function setColumnVisibility(): bool
    {
        (new ChassisListScreen())->setColumnVisibility();

        // @todo コンテナ一覧, RORO一覧, ...も同じように列の可視不可視を設定する

        return false;
    }

    /**
     * 写真の順番を設定する
     * @return bool
     */
    public function setOrderOfPhotos(): bool
    {
        //引用元:https://docs.google.com/spreadsheets/d/1zOoDqyRbo7hdQAKAQYOg9gN0ZGSWW9DkRtxakGYWmIE/edit#gid=406613788
        //現状：撮影の順番とお客様が見たい写真の並び順が違う
        //
        //LP２の仕様は残しつつ追加として以下を実装する。
        //任意の順番で並べ替える。＊並べ替えモードのようなイメージで並べ替える
        //ドラッグ＆ドロップ等
        //並べ替えたら全てに反映(写真の並び順の情報持たせる)
        //カテゴリー分け（外装・内装等）はいらない。

        (new ChassisPhoto)->ordinary;

        (new ChassisPhotoScreen())->setOrderOfPhotos();

        // @todo 車輌の写真の一括更新のAPI

        // @todo 車輌の写真以外でも同じことが必要

        return false;
    }

    /**
     * 写真の回転
     * @return bool
     */
    public function rotatePhoto(): bool
    {
        // 写真の回転状態を保存する
        // 斜め回転は不要

        (new ChassisPhoto())->rotate;

        (new ChassisPhotoScreen())->rotatePhoto();
        (new ChassisUpdatePhotoApi())->main();

        // @todo 車輌の写真以外でも同じことが必要

        return false;
    }
}
