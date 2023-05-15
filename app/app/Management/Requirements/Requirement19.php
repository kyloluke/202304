<?php

namespace App\Management\Requirements;

use App\Management\Functions\MiscUi;

/**
 * La-Plus３：開発主要要件一覧　No.19
 */
class Requirement19
{
    //機能カテゴリ(サービス)
    //コンテナ船積管理

    //サブカテゴリ
    //コンテナ写真

    //要件・要望
    //写真回転状態の保存機能

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
