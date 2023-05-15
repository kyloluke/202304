<?php

namespace App\Management\Requirements;

use App\Management\Models\Chassis;

/**
 * La-Plus３：開発主要要件一覧　No.11
 */
class Requirement11
{
    //機能カテゴリ(サービス)
    //車輌管理

    //サブカテゴリ
    //登録・編集

    //要件・要望
    //荷主側の車輛管理番号を新規項目として追加。
    //その他、荷主向けの追加項目があれば合わせて追加。

    //補足
    //検査ステータス

    //---

    //LP3機能一覧 > No.1 > LP3要件・要望
    //車輌管理番号の新規追加
    //荷主の車輌番号（荷主REFNo）JOB全体に紐づいており、各車輌に紐づいていないので、各車輌につけられたら便利。

    /**
     * main
     *
     * @return bool
     */
    public function main(): bool
    {
        // 車輌に 荷主REFNo を追加
        // 車輌に 検査履歴 を追加
        $chassis = (new Chassis());
        $chassis->shipperRefNo;
        $chassis->chassisExamEvents;
        return true;
    }
}
