<?php

namespace App\Management\Requirements;

use App\Management\Functions\MiscUi;

/**
 * La-Plus３：開発主要要件一覧　No.18
 */
class Requirement18
{
    //機能カテゴリ(サービス)
    //コンテナ船積管理

    //サブカテゴリ
    //コンテナ写真

    //要件・要望
    //写真の斜め回転は不要。

    //補足
    //(なし)

    /**
     * main
     *
     * @return bool
     */
    public function main()
    {
        //業務フロー外(UI)の写真の回転
        (new MiscUi())->rotatePhoto();

        return true;
    }
}
