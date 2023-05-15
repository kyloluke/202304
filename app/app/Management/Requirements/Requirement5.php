<?php

namespace App\Management\Requirements;

use App\Management\Functions\MiscUi;

/**
 * La-Plus３：開発主要要件一覧　No.5
 */
class Requirement5
{
    //機能カテゴリ(サービス)
    //車輌管理

    //サブカテゴリ
    //車両写真

    //要件・要望
    //写真回転状態の保存機能

    //補足
    //(なし)

    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        //業務フロー外(UI)の写真の回転
        (new MiscUi())->rotatePhoto();

        return true;
    }
}
