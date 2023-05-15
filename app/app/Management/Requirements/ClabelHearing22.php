<?php

namespace App\Management\Requirements;

use App\Management\Models\Chassis;
use App\Management\Screens\Chassis\ChassisEditScreen;

/**
 * ヒアリング改善要望 No.22
 */
class ClabelHearing22
{
    //課題＆要望
    //LWH項目箇所に重量の入力項目も追加したい

    //背景/理由
    //3つのヤード(川崎千鳥・東扇島ヤード・東扇島RORO)は、荷役をしてくれる企業(協力会社)に送るために重量が必要なため

    //改善案
    //STOCKに項目として用意する（ROROリストの車輌には表示させなくてよい）

    // メモ
    // (なし)

    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        (new Chassis)->weight;

        (new ChassisEditScreen())->editWeight();

        // 作成、更新のAPIにも変更が必要だが、省略

        return true;
    }
}
