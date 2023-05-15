<?php

namespace App\Management\Requirements;

use App\Management\Models\CarBrand;
use App\Management\Models\CarModel;
use App\Management\Models\Chassis;

/**
 * 2022/11/15の打ち合わせ
 */
class Meeting20221115
{
    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        //memo:
        //シーラベルに対してLP3の説明をしたミーティング
        //メーカーマスタの追加自体はこれよりも前の打ち合わせで挙がった要件
        //参考: 2022/10/27 SYNC福岡オフィスでの打ち合わせの第2部 https://sync-logi.backlog.com/alias/wiki/2232760

        //メーカーマスタ
        //ないのが不思議だったので追加
        //ソース:紀平のメモ
        (new CarBrand());

        //車名 -> モデル に呼称を変更
        //ソース:紀平のメモ
        (new CarModel());

        //メーカー、モデルまでは書くが、グレードみたいなものは不要
        //ソース:紀平のメモ
        (new Chassis())->carModel;

        //メーカーや車種を定期的に取り込めたら良い
        //ソース:紀平のメモ
        //打ち合わせの際に話に上がったが、直近の優先度は低い

        return false;
    }
}
