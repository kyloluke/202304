<?php

namespace App\Management\Requirements;

use App\Management\Functions\MiscUi;

/**
 * La-Plus３：開発主要要件一覧　No.20
 */
class Requirement20
{
    //機能カテゴリ(サービス)
    //コンテナ船積管理

    //サブカテゴリ
    //コンテナ写真

    //要件・要望
    //写真の表示順を指定出来るようにしたい。

    //補足
    //(なし)

    /**
     * main
     *
     * @return bool
     */
    public function main()
    {
        //業務フロー外(UI)の写真の順番の設定
        (new MiscUi())->setOrderOfPhotos();

        return true;
    }
}
